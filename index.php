<?php
/**
 * Root Entry Point
 * Redirects to public/index.php for easier access
 */

// Change to public directory context
chdir(__DIR__ . '/public');

// Include the main entry point
require __DIR__ . '/public/index.php';

