# Script untuk setup PostgreSQL di Windows
# Author: AI Assistant
# Description: Automated setup script untuk migrasi ke PostgreSQL

Write-Host "================================" -ForegroundColor Cyan
Write-Host "  NCS Laravel PostgreSQL Setup  " -ForegroundColor Cyan
Write-Host "================================" -ForegroundColor Cyan
Write-Host ""

# Function untuk check command availability
function Test-Command {
    param($Command)
    try {
        if (Get-Command $Command -ErrorAction Stop) {
            return $true
        }
    } catch {
        return $false
    }
}

# Step 1: Check PostgreSQL Installation
Write-Host "[1/6] Checking PostgreSQL installation..." -ForegroundColor Yellow
if (Test-Command "psql") {
    Write-Host "   ✓ PostgreSQL found!" -ForegroundColor Green
    $pgVersion = psql --version
    Write-Host "   Version: $pgVersion" -ForegroundColor Gray
} else {
    Write-Host "   ✗ PostgreSQL not found!" -ForegroundColor Red
    Write-Host ""
    Write-Host "   Please install PostgreSQL first:" -ForegroundColor Yellow
    Write-Host "   1. Download from: https://www.postgresql.org/download/windows/" -ForegroundColor White
    Write-Host "   2. Or use Laragon Quick Add" -ForegroundColor White
    Write-Host ""
    Write-Host "   After installation, run this script again." -ForegroundColor Cyan
    Read-Host "   Press Enter to exit"
    exit 1
}

# Step 2: Check PHP PostgreSQL Extension
Write-Host ""
Write-Host "[2/6] Checking PHP PostgreSQL extensions..." -ForegroundColor Yellow
$phpExtensions = php -m
if ($phpExtensions -match "pdo_pgsql" -and $phpExtensions -match "pgsql") {
    Write-Host "   ✓ PHP PostgreSQL extensions enabled!" -ForegroundColor Green
} else {
    Write-Host "   ✗ PHP PostgreSQL extensions not found!" -ForegroundColor Red
    Write-Host ""
    Write-Host "   Please enable the following extensions in php.ini:" -ForegroundColor Yellow
    Write-Host "   - extension=pdo_pgsql" -ForegroundColor White
    Write-Host "   - extension=pgsql" -ForegroundColor White
    Write-Host ""
    $phpIni = php --ini | Select-String "Loaded Configuration File"
    Write-Host "   $phpIni" -ForegroundColor Gray
    Write-Host ""
    Read-Host "   Press Enter after enabling extensions"
    exit 1
}

# Step 3: Get Database Credentials
Write-Host ""
Write-Host "[3/6] Database Configuration" -ForegroundColor Yellow
Write-Host "   Please provide your PostgreSQL credentials:" -ForegroundColor White
Write-Host ""

$dbHost = Read-Host "   Database Host (default: 127.0.0.1)"
if ([string]::IsNullOrWhiteSpace($dbHost)) { $dbHost = "127.0.0.1" }

$dbPort = Read-Host "   Database Port (default: 5432)"
if ([string]::IsNullOrWhiteSpace($dbPort)) { $dbPort = "5432" }

$dbName = Read-Host "   Database Name (default: ncs_laravel)"
if ([string]::IsNullOrWhiteSpace($dbName)) { $dbName = "ncs_laravel" }

$dbUser = Read-Host "   Database Username (default: postgres)"
if ([string]::IsNullOrWhiteSpace($dbUser)) { $dbUser = "postgres" }

$dbPassword = Read-Host "   Database Password" -AsSecureString
$dbPasswordPlain = [Runtime.InteropServices.Marshal]::PtrToStringAuto(
    [Runtime.InteropServices.Marshal]::SecureStringToBSTR($dbPassword)
)

# Step 4: Test Connection
Write-Host ""
Write-Host "[4/6] Testing PostgreSQL connection..." -ForegroundColor Yellow
$env:PGPASSWORD = $dbPasswordPlain
$testConnection = psql -h $dbHost -p $dbPort -U $dbUser -d postgres -c "SELECT version();" 2>&1

if ($LASTEXITCODE -eq 0) {
    Write-Host "   ✓ Connection successful!" -ForegroundColor Green
} else {
    Write-Host "   ✗ Connection failed!" -ForegroundColor Red
    Write-Host "   Error: $testConnection" -ForegroundColor Gray
    Write-Host ""
    Read-Host "   Press Enter to exit"
    exit 1
}

# Step 5: Create Database
Write-Host ""
Write-Host "[5/6] Creating database '$dbName'..." -ForegroundColor Yellow
$createDb = psql -h $dbHost -p $dbPort -U $dbUser -d postgres -c "CREATE DATABASE $dbName;" 2>&1

if ($createDb -match "already exists") {
    Write-Host "   ⚠ Database already exists, skipping..." -ForegroundColor Yellow
} elseif ($LASTEXITCODE -eq 0) {
    Write-Host "   ✓ Database created successfully!" -ForegroundColor Green
} else {
    Write-Host "   ✗ Failed to create database!" -ForegroundColor Red
    Write-Host "   Error: $createDb" -ForegroundColor Gray
}

# Step 6: Update .env file
Write-Host ""
Write-Host "[6/6] Updating .env file..." -ForegroundColor Yellow

if (-not (Test-Path ".env")) {
    if (Test-Path ".env.example") {
        Copy-Item ".env.example" ".env"
        Write-Host "   ✓ Created .env from .env.example" -ForegroundColor Green
    } else {
        Write-Host "   ✗ .env.example not found!" -ForegroundColor Red
        Read-Host "   Press Enter to exit"
        exit 1
    }
}

# Update .env configuration
$envContent = Get-Content ".env"
$envContent = $envContent -replace "DB_CONNECTION=.*", "DB_CONNECTION=pgsql"
$envContent = $envContent -replace "DB_HOST=.*", "DB_HOST=$dbHost"
$envContent = $envContent -replace "DB_PORT=.*", "DB_PORT=$dbPort"
$envContent = $envContent -replace "DB_DATABASE=.*", "DB_DATABASE=$dbName"
$envContent = $envContent -replace "DB_USERNAME=.*", "DB_USERNAME=$dbUser"
$envContent = $envContent -replace "DB_PASSWORD=.*", "DB_PASSWORD=$dbPasswordPlain"

Set-Content ".env" -Value $envContent
Write-Host "   ✓ .env file updated!" -ForegroundColor Green

# Clear Laravel cache
Write-Host ""
Write-Host "Clearing Laravel cache..." -ForegroundColor Yellow
php artisan config:clear | Out-Null
php artisan cache:clear | Out-Null
Write-Host "   ✓ Cache cleared!" -ForegroundColor Green

# Generate app key if needed
$appKey = Select-String -Path ".env" -Pattern "APP_KEY=base64:"
if (-not $appKey) {
    Write-Host ""
    Write-Host "Generating application key..." -ForegroundColor Yellow
    php artisan key:generate
    Write-Host "   ✓ Application key generated!" -ForegroundColor Green
}

# Final steps
Write-Host ""
Write-Host "================================" -ForegroundColor Cyan
Write-Host "  Setup Complete! ✓            " -ForegroundColor Cyan
Write-Host "================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Next steps:" -ForegroundColor Yellow
Write-Host "  1. Run migrations:" -ForegroundColor White
Write-Host "     php artisan migrate:fresh" -ForegroundColor Gray
Write-Host ""
Write-Host "  2. (Optional) Seed sample data:" -ForegroundColor White
Write-Host "     php artisan db:seed" -ForegroundColor Gray
Write-Host ""
Write-Host "  3. Test the application:" -ForegroundColor White
Write-Host "     php artisan test" -ForegroundColor Gray
Write-Host ""
Write-Host "  4. Start development server:" -ForegroundColor White
Write-Host "     php artisan serve" -ForegroundColor Gray
Write-Host ""

$runMigration = Read-Host "Do you want to run migrations now? (y/n)"
if ($runMigration -eq "y" -or $runMigration -eq "Y") {
    Write-Host ""
    Write-Host "Running migrations..." -ForegroundColor Yellow
    php artisan migrate:fresh
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host ""
        Write-Host "✓ Migrations completed successfully!" -ForegroundColor Green
        Write-Host ""
        Write-Host "Database is ready to use! 🚀" -ForegroundColor Cyan
    } else {
        Write-Host ""
        Write-Host "✗ Migration failed. Please check the errors above." -ForegroundColor Red
    }
}

Write-Host ""
Write-Host "Thank you for using PostgreSQL Setup! 🐘" -ForegroundColor Cyan
Write-Host ""

