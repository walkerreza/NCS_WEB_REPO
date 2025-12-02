-- NCS Laboratory Database Schema
-- PostgreSQL Database

-- Drop existing tables if exist (for fresh installation)
DROP TABLE IF EXISTS comments CASCADE;
DROP TABLE IF EXISTS documents CASCADE;
DROP TABLE IF EXISTS gallery CASCADE;
DROP TABLE IF EXISTS agenda CASCADE;
DROP TABLE IF EXISTS services CASCADE;
DROP TABLE IF EXISTS focus_areas CASCADE;
DROP TABLE IF EXISTS roadmap CASCADE;
DROP TABLE IF EXISTS team_members CASCADE;
DROP TABLE IF EXISTS organization_structure CASCADE;
DROP TABLE IF EXISTS settings CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS external_links CASCADE;

-- Create extension for UUID (optional)
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

-- Users table for admin authentication
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role VARCHAR(20) DEFAULT 'admin' CHECK (role IN ('admin', 'operator')),
    avatar VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    last_login TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Settings table for dynamic content
CREATE TABLE settings (
    id SERIAL PRIMARY KEY,
    key VARCHAR(100) UNIQUE NOT NULL,
    value TEXT,
    type VARCHAR(20) DEFAULT 'text',
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Organization structure table
CREATE TABLE organization_structure (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    photo VARCHAR(255),
    email VARCHAR(100),
    phone VARCHAR(20),
    order_index INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Team members (development team credits)
CREATE TABLE team_members (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nim VARCHAR(20),
    role VARCHAR(100),
    photo VARCHAR(255),
    group_name VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Agenda table for upcoming events
CREATE TABLE agenda (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    event_date DATE NOT NULL,
    event_time TIME,
    location VARCHAR(255),
    image VARCHAR(255),
    is_featured BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_by INT REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Gallery table for photos/videos documentation
CREATE TABLE gallery (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    file_path VARCHAR(255) NOT NULL,
    file_type VARCHAR(20) DEFAULT 'image' CHECK (file_type IN ('image', 'video')),
    category VARCHAR(50),
    event_date DATE,
    is_featured BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    view_count INT DEFAULT 0,
    created_by INT REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Documents table for research and community service PDFs
CREATE TABLE documents (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    file_path VARCHAR(255) NOT NULL,
    file_size INT,
    category VARCHAR(50) NOT NULL CHECK (category IN ('penelitian', 'pengabdian')),
    author VARCHAR(255),
    publication_date DATE,
    keywords TEXT,
    download_count INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_by INT REFERENCES users(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Services table for facilities and consultation
CREATE TABLE services (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(50) NOT NULL CHECK (category IN ('sarana', 'konsultatif')),
    icon VARCHAR(50),
    image VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    order_index INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Focus Areas table for lab specialization areas
CREATE TABLE focus_areas (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    icon VARCHAR(50),
    is_active BOOLEAN DEFAULT TRUE,
    order_index INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Roadmap table for lab development milestones
CREATE TABLE roadmap (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    year INT NOT NULL,
    quarter VARCHAR(10),
    status VARCHAR(20) DEFAULT 'upcoming' CHECK (status IN ('completed', 'in_progress', 'upcoming')),
    icon VARCHAR(50),
    is_active BOOLEAN DEFAULT TRUE,
    order_index INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- External links table
CREATE TABLE external_links (
    id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    url VARCHAR(500) NOT NULL,
    icon VARCHAR(50),
    description VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    order_index INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Comments/Guest messages table
CREATE TABLE comments (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255),
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    is_replied BOOLEAN DEFAULT FALSE,
    reply_message TEXT,
    replied_at TIMESTAMP,
    replied_by INT REFERENCES users(id),
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create indexes for better performance
CREATE INDEX idx_documents_category ON documents(category);
CREATE INDEX idx_gallery_category ON gallery(category);
CREATE INDEX idx_agenda_event_date ON agenda(event_date);
CREATE INDEX idx_services_category ON services(category);
CREATE INDEX idx_comments_is_read ON comments(is_read);

-- Insert default admin user (password: admin123)
-- Hash generated with: password_hash('admin123', PASSWORD_DEFAULT)
INSERT INTO users (username, email, password, full_name, role) VALUES
('admin', 'admin@ncslab.ac.id', '$2y$10$xLRsKP9NDl7Y1xLHrKd3/.YKqMCG3bwLtPxvGVDvBRaLB8g5.vhWO', 'Administrator', 'admin');

-- Insert default settings
INSERT INTO settings (key, value, type, description) VALUES
('site_name', 'NCS Laboratory', 'text', 'Nama situs web'),
('site_tagline', 'Network & Cyber Security Laboratory', 'text', 'Tagline situs'),
('site_description', 'Laboratorium Network & Cyber Security - Pusat Riset Keamanan Siber', 'textarea', 'Deskripsi situs'),
('site_logo', '', 'image', 'Logo situs'),
('site_favicon', '', 'image', 'Favicon situs'),
('contact_email', 'ncslab@polinema.ac.id', 'text', 'Email kontak'),
('contact_phone', '+62-341-404424', 'text', 'Nomor telepon'),
('contact_address', 'Politeknik Negeri Malang, Jl. Soekarno Hatta No.9, Malang 65141', 'textarea', 'Alamat'),
('pendahuluan', 'NCS Laboratory (Network & Cyber Security Laboratory) adalah laboratorium penelitian dan pengembangan yang berfokus pada bidang keamanan jaringan dan siber. Didirikan untuk menjadi pusat unggulan dalam riset, edukasi, dan layanan konsultasi keamanan digital, laboratorium ini berkomitmen untuk menghasilkan inovasi yang relevan dengan tantangan keamanan siber di era digital.\n\nSebagai bagian dari Politeknik Negeri Malang, NCS Lab mendukung pengembangan sumber daya manusia yang kompeten di bidang cyber security melalui berbagai program penelitian, pelatihan, dan sertifikasi profesional.', 'textarea', 'Pendahuluan/Tentang Lab'),
('visi', 'Menjadi pusat riset dan pengembangan keamanan siber terkemuka di Indonesia yang menghasilkan inovasi dan solusi dalam bidang Network & Cyber Security untuk mendukung transformasi digital nasional.', 'textarea', 'Visi laboratorium'),
('misi', '1. Melakukan penelitian dan pengembangan berkelanjutan di bidang keamanan jaringan dan siber\n2. Menyediakan layanan konsultasi dan audit keamanan untuk industri dan pemerintah\n3. Mengembangkan sumber daya manusia yang kompeten melalui program pelatihan dan sertifikasi\n4. Menjalin kerjasama strategis dengan industri, institusi pendidikan, dan lembaga terkait\n5. Berkontribusi dalam edukasi keamanan siber untuk masyarakat luas', 'textarea', 'Misi laboratorium'),
('footer_text', '© 2025 NCS Laboratory. All Rights Reserved.', 'text', 'Teks footer'),
('social_instagram', '', 'text', 'Link Instagram'),
('social_youtube', '', 'text', 'Link YouTube'),
('social_github', '', 'text', 'Link GitHub');

-- Insert sample external links
INSERT INTO external_links (title, url, icon, description, order_index) VALUES
('Polinema', 'https://www.polinema.ac.id', 'building', 'Website resmi Politeknik Negeri Malang', 1),
('SINTA', 'https://sinta.kemdikbud.go.id', 'book', 'Science and Technology Index', 2),
('SIM PKM', 'https://simbelmawa.kemdikbud.go.id', 'graduation-cap', 'Sistem Informasi Manajemen PKM', 3);

-- Insert sample team members (development team)
INSERT INTO team_members (name, nim, role, group_name) VALUES
('Member 1', '1234567890', 'Project Leader', 'Tim Pengembang NCS'),
('Member 2', '1234567891', 'Backend Developer', 'Tim Pengembang NCS'),
('Member 3', '1234567892', 'Frontend Developer', 'Tim Pengembang NCS'),
('Member 4', '1234567893', 'UI/UX Designer', 'Tim Pengembang NCS'),
('Member 5', '1234567894', 'Database Administrator', 'Tim Pengembang NCS');

-- Insert sample organization structure
INSERT INTO organization_structure (name, position, email, order_index) VALUES
('Dr. Example Name, M.T.', 'Kepala Laboratorium', 'kepala@ncslab.ac.id', 1),
('John Doe, M.Kom.', 'Sekretaris', 'sekretaris@ncslab.ac.id', 2),
('Jane Smith, M.Cs.', 'Koordinator Penelitian', 'penelitian@ncslab.ac.id', 3);

-- Insert sample services
INSERT INTO services (title, description, category, icon, order_index) VALUES
('Ruang Server', 'Fasilitas ruang server dengan pendingin AC 24 jam dan sistem keamanan terpadu', 'sarana', 'server', 1),
('Lab Komputer', 'Laboratorium dengan 30 unit komputer high-end untuk praktikum dan penelitian', 'sarana', 'desktop', 2),
('Perangkat Jaringan', 'Router, Switch, dan perangkat jaringan enterprise untuk simulasi dan penelitian', 'sarana', 'network-wired', 3),
('Konsultasi Keamanan Jaringan', 'Layanan konsultasi untuk audit dan penilaian keamanan jaringan', 'konsultatif', 'shield-alt', 1),
('Pelatihan Cyber Security', 'Program pelatihan dan sertifikasi di bidang keamanan siber', 'konsultatif', 'user-shield', 2),
('Pengujian Penetrasi', 'Layanan penetration testing untuk menguji keamanan sistem', 'konsultatif', 'bug', 3);

-- Insert sample focus areas (Bidang Fokus Lab)
INSERT INTO focus_areas (title, description, icon, order_index) VALUES
('Network Security', 'Penelitian dan pengembangan sistem keamanan jaringan komputer, termasuk firewall, IDS/IPS, dan network monitoring untuk melindungi infrastruktur digital dari ancaman siber.', 'network-wired', 1),
('Penetration Testing', 'Pengujian keamanan sistem melalui simulasi serangan untuk mengidentifikasi kerentanan dan celah keamanan sebelum dieksploitasi oleh pihak tidak bertanggung jawab.', 'user-secret', 2),
('Digital Forensics', 'Investigasi insiden keamanan siber dan pemulihan bukti digital untuk keperluan audit, investigasi hukum, dan analisis pasca-insiden.', 'search', 3),
('Cryptography', 'Penelitian algoritma enkripsi dan protokol keamanan untuk melindungi kerahasiaan dan integritas data dalam komunikasi digital.', 'lock', 4),
('Malware Analysis', 'Analisis dan reverse engineering malware untuk memahami perilaku, vektor serangan, dan mengembangkan countermeasures yang efektif.', 'virus', 5),
('IoT Security', 'Keamanan perangkat Internet of Things mencakup penelitian vulnerability assessment dan pengembangan protokol keamanan untuk perangkat terhubung.', 'microchip', 6);

-- Insert sample roadmap
INSERT INTO roadmap (title, description, year, quarter, status, icon, order_index) VALUES
('Pendirian Laboratorium', 'Pembentukan NCS Laboratory sebagai pusat riset keamanan siber di Politeknik Negeri Malang', 2023, 'Q1', 'completed', 'flag', 1),
('Pengadaan Infrastruktur', 'Pengadaan perangkat keras dan lunak untuk mendukung kegiatan riset dan praktikum', 2023, 'Q2', 'completed', 'server', 2),
('Program Sertifikasi', 'Peluncuran program pelatihan dan sertifikasi cyber security untuk mahasiswa dan umum', 2023, 'Q4', 'completed', 'certificate', 3),
('Kerjasama Industri', 'Membangun kemitraan strategis dengan perusahaan teknologi dan institusi keamanan siber', 2024, 'Q1', 'completed', 'handshake', 4),
('Pengembangan CTF Platform', 'Membangun platform Capture The Flag untuk kompetisi dan pembelajaran keamanan siber', 2024, 'Q2', 'in_progress', 'flag-checkered', 5),
('Research Publication', 'Target publikasi penelitian di jurnal internasional bereputasi', 2024, 'Q3', 'in_progress', 'book', 6),
('Security Operations Center', 'Pembangunan SOC untuk monitoring keamanan real-time dan incident response', 2024, 'Q4', 'upcoming', 'shield-alt', 7),
('International Collaboration', 'Kerjasama riset dengan universitas dan lembaga internasional', 2025, 'Q1', 'upcoming', 'globe', 8);

-- Insert sample documents (6 Penelitian)
INSERT INTO documents (title, description, file_path, category, author, publication_date, keywords) VALUES
('Analisis Kerentanan Jaringan IoT', 'Penelitian mendalam mengenai kerentanan keamanan pada perangkat Internet of Things dan solusi mitigasinya', 'penelitian-iot-security.pdf', 'penelitian', 'Tim Peneliti NCS Lab', '2024-01-15', 'IoT, vulnerability, security, network'),
('Implementasi Machine Learning untuk Deteksi Intrusi', 'Pengembangan sistem deteksi intrusi berbasis machine learning untuk jaringan komputer enterprise', 'penelitian-ml-ids.pdf', 'penelitian', 'Tim Peneliti NCS Lab', '2024-02-20', 'machine learning, IDS, intrusion detection, AI'),
('Studi Komparatif Algoritma Enkripsi Modern', 'Perbandingan performa dan keamanan algoritma enkripsi AES, ChaCha20, dan RSA', 'penelitian-enkripsi.pdf', 'penelitian', 'Tim Peneliti NCS Lab', '2024-03-10', 'encryption, AES, RSA, cryptography'),
('Analisis Malware Android Terbaru', 'Reverse engineering dan analisis perilaku malware yang menyerang perangkat Android', 'penelitian-malware-android.pdf', 'penelitian', 'Tim Peneliti NCS Lab', '2024-04-05', 'malware, Android, reverse engineering, mobile security'),
('Pengamanan API REST dengan OAuth 2.0', 'Best practices dan implementasi keamanan API menggunakan protokol OAuth 2.0', 'penelitian-api-security.pdf', 'penelitian', 'Tim Peneliti NCS Lab', '2024-05-12', 'API, OAuth, REST, authentication'),
('Forensik Digital pada Cloud Computing', 'Metodologi investigasi forensik digital pada lingkungan cloud computing', 'penelitian-cloud-forensics.pdf', 'penelitian', 'Tim Peneliti NCS Lab', '2024-06-18', 'forensics, cloud, digital investigation');

-- Insert sample documents (6 Pengabdian)
INSERT INTO documents (title, description, file_path, category, author, publication_date, keywords) VALUES
('Workshop Keamanan Siber untuk UMKM', 'Pelatihan kesadaran keamanan siber dan perlindungan data untuk pelaku UMKM di Malang Raya', 'pengabdian-umkm-security.pdf', 'pengabdian', 'Tim Pengabdian NCS Lab', '2024-01-25', 'UMKM, awareness, training, cyber security'),
('Pendampingan Implementasi ISMS SMK', 'Pendampingan implementasi Information Security Management System di SMK Negeri se-Malang', 'pengabdian-isms-smk.pdf', 'pengabdian', 'Tim Pengabdian NCS Lab', '2024-02-28', 'ISMS, SMK, implementation, security management'),
('Sosialisasi Internet Sehat untuk Pelajar', 'Program edukasi penggunaan internet yang aman dan sehat untuk pelajar tingkat SMP dan SMA', 'pengabdian-internet-sehat.pdf', 'pengabdian', 'Tim Pengabdian NCS Lab', '2024-03-15', 'internet sehat, pelajar, edukasi, digital literacy'),
('Audit Keamanan Website Pemerintah Daerah', 'Layanan audit keamanan website dan aplikasi untuk instansi pemerintah daerah', 'pengabdian-audit-pemda.pdf', 'pengabdian', 'Tim Pengabdian NCS Lab', '2024-04-20', 'audit, government, website security, vulnerability'),
('Pelatihan Ethical Hacking untuk Guru TIK', 'Workshop ethical hacking dan penetration testing dasar untuk guru TIK', 'pengabdian-ethical-hacking.pdf', 'pengabdian', 'Tim Pengabdian NCS Lab', '2024-05-10', 'ethical hacking, teacher training, penetration testing'),
('Konsultasi Keamanan Data Rumah Sakit', 'Pendampingan implementasi keamanan data pasien sesuai standar kesehatan', 'pengabdian-rs-security.pdf', 'pengabdian', 'Tim Pengabdian NCS Lab', '2024-06-25', 'healthcare, data protection, hospital, privacy');

-- Insert sample agenda
INSERT INTO agenda (title, description, event_date, event_time, location, is_featured) VALUES
('Workshop Capture The Flag', 'Kompetisi dan workshop CTF untuk mahasiswa dengan hadiah menarik. Pelajari teknik hacking secara legal dan etis.', '2025-01-15', '08:00:00', 'Lab NCS, Gedung Elektro Lt.3', TRUE),
('Seminar Cyber Security Trends 2025', 'Seminar nasional membahas tren keamanan siber terbaru dan tantangan di tahun 2025.', '2025-01-22', '09:00:00', 'Auditorium Polinema', TRUE),
('Pelatihan Penetration Testing', 'Pelatihan intensif 3 hari tentang metodologi dan tools penetration testing profesional.', '2025-02-05', '08:00:00', 'Lab NCS, Gedung Elektro Lt.3', FALSE),
('Guest Lecture: Karir di Cybersecurity', 'Sharing session dari praktisi cybersecurity industri tentang peluang karir di bidang keamanan siber.', '2025-02-12', '13:00:00', 'Ruang Seminar Elektro', FALSE),
('Lomba Web Security Competition', 'Kompetisi keamanan web antar mahasiswa se-Jawa Timur dengan tantangan vulnerability hunting.', '2025-03-01', '08:00:00', 'Lab Komputer Terpadu', TRUE),
('Workshop Digital Forensics', 'Pelatihan investigasi forensik digital menggunakan tools open source.', '2025-03-15', '08:00:00', 'Lab NCS, Gedung Elektro Lt.3', FALSE);

