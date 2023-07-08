<?php
// view_document.php

if (isset($_GET['document'])) {
    $document = $_GET['document'];
    
    // Check if the document exists
    if (file_exists('uploads/' . $document)) {
        // Set the appropriate content type header based on the document type
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($file_info, 'uploads/' . $document);
        finfo_close($file_info);
        
        header('Content-Type: ' . $mime_type);
        
        // Output the document content
        readfile('uploads/' . $document);
        exit;
    }
}

// If the document doesn't exist or there was an error, display an error message
echo "Document not found.";
?>
