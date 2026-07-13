<?php

// Create view compilation directory on Vercel's writeable disk (/tmp) if it doesn't exist
if (!is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0755, true);
}

// Forward Vercel requests to normal Laravel public/index.php
require __DIR__ . '/../public/index.php';
