<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo !empty($page_title) ? $page_title . ' - CMS Admin' : 'CMS Admin Dashboard'; ?></title>
  <link href="../../assets/css/admin_css.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css" rel="stylesheet">
  <style>
    /* Minimalist fix for sidebar height and positioning */
    html, body {
      padding: 0;
    }

    body {
      box-sizing: border-box; /* Ensure consistent box model */
      margin: 0; /* Reset all margins first */
    }

    .wrapper {
      padding: 0;
    }

    .sidebar {
      position: fixed;
      left: 0;
      top: 60px;
      width: 260px;
      height: calc(100vh - 60px);
      z-index: 900;
    }

    .main-content {
      min-height: calc(100vh - 60px); /* Keep min-height for main content */
      padding-left: 150px;
      padding-top: 30px;
    }

    /* Ensure jQuery UI overlay covers entire page */
    .ui-widget-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7) !important; /* Make it darker */
      z-index: 9999 !important; /* Higher than navbar (1000) and sidebar (900) */
    }

    /* Global Card Styles (moved from dashboard) */
    .stat-card {
      background: white;
      border: 1px solid #e5e7eb; /* --border-color */
      border-radius: 12px;
      padding: 24px;
      display: flex;
      align-items: center; /* Center horizontally in column layout */
      gap: 8px; /* Adjust gap for vertical spacing */
      transition: all 0.3s ease;
      flex-direction: column; /* Change to vertical layout */
      text-align: center; /* Center text within the card */
    }

    .stat-icon {
      width: 50px;
      height: 50px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 24px;
      margin-bottom: 16px; /* Space between icon and text */
    }

    .stat-content {
      text-align: center; /* Ensure text content is centered */
    }

    .stat-content h3 {
      font-size: 14px;
      color: #6b7280; /* --text-muted */
      margin-bottom: 8px;
      font-weight: 500;
    }

    .stat-number {
      font-size: 36px;
      font-weight: bold;
      color: #111827;
      margin: 0;
    }

    /* Global Custom styles for jQuery UI Dialog to match theme (moved from dashboard) */
    .ui-dialog {
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      border: 1px solid #e5e7eb; /* --border-color */
      padding: 0;
    }

    .ui-dialog .ui-dialog-titlebar {
      background: white;
      border: none;
      border-bottom: 1px solid #e5e7eb; /* --border-color */
      border-radius: 12px 12px 0 0;
      padding: 20px;
      font-weight: 500;
    }

    .ui-dialog .ui-dialog-title {
      font-size: 1.25rem;
      font-weight: 500;
    }

    .ui-dialog .ui-dialog-titlebar-close {
      border: none;
      background: transparent;
      font-size: 1.5rem;
      color: #6b7280; /* --text-muted */
    }
    
    .ui-dialog .ui-dialog-titlebar-close:hover {
      color: #111827;
    }

    .ui-dialog .ui-dialog-content {
      padding: 24px;
    }

    /* Generalize modal list item styles */
    .ui-dialog .list-group-item {
      font-size: 1.1rem; /* Larger text for list items */
    }

    .ui-dialog .list-group-item .badge {
      font-size: 1.2rem; /* Larger numbers for badges */
    }

    /* Global Card Styles */
    .card {
      transition: all 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    /* Fix for dashboard card link underline */
    a.stat-card-link {
      text-decoration: none;
      color: inherit;
    }

    /* Custom styles for message cards */
    .message-card {
      cursor: pointer;
      border: 2px solid #e5e7eb; /* --border-color */
      border-radius: 12px;
      padding: 40px;
      transition: all 0.3s ease;
    }

    .message-card.message-unread {
      border-color: #3b82f6;
      background-color: #f0f9ff;
    }

    .message-card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transform: translateY(-2px);
    }

    /* Ensure navbar stays fixed */
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
    }
  </style>
</head>

<body>
