<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn about XSS and SQL Injection prevention techniques in CodeIgniter.">
    <title>XSS and SQL Injection Prevention in CodeIgniter</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
        }

        h2, h3 {
            margin-top: 20px;
        }

        pre {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            margin-top: 10px;
        }

        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="button-container">
            <a href="<?= site_url('weather') ?>" class="btn btn-secondary">Back</a>
            <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a> 
        </div>
        
        <h1 class="text-center">Preventing XSS and SQL Injection in CodeIgniter</h1>
        
        <section aria-labelledby="overview">
            <h2 id="overview">Overview</h2>
            <p>In CodeIgniter 4, the <code>xss_clean()</code> function is deprecated. Instead, built-in methods handle XSS protection and input sanitization automatically.</p>
        </section>

        <section aria-labelledby="xss-prevention">
            <h2 id="xss-prevention">Preventing XSS (Cross-Site Scripting)</h2>
            <p>CodeIgniter 4 automatically escapes output to prevent XSS by default. Here’s how to handle user input safely:</p>
            
            <h3>1. Using Built-in Escaping</h3>
            <p>When outputting data in your views, use the <code>esc()</code> function to escape HTML entities:</p>
            <pre>&lt;?= esc($user['username']) ?&gt;</pre>
            
            <h3>2. Automatic XSS Protection</h3>
            <p>CodeIgniter 4 applies XSS filtering automatically when data is posted. You can configure global settings to enforce this.</p>
            <p>Enable CSRF protection by updating your <code>app/Config/Filters.php</code> file:</p>
            <pre>
public $globals = [
    'before' => [
        'csrf' => ['except' => ['api/*']], // Example exception for APIs
    ],
    'after'  => [],
];
            </pre>
        </section>

        <section aria-labelledby="sql-injection-prevention">
            <h2 id="sql-injection-prevention">Preventing SQL Injection</h2>
            <p>CodeIgniter 4's Query Builder helps prevent SQL injection by using prepared statements:</p>
            
            <h3>Example Using Query Builder</h3>
            <pre>$this->db->table('users')->getWhere(['username' => $username]);</pre>
            <p>This method automatically escapes the input, providing protection against SQL injection attacks.</p>
        </section>
        
        <section aria-labelledby="conclusion">
            <h2 id="conclusion">Conclusion</h2>
            <p>With CodeIgniter 4, developers can leverage built-in functions that automatically protect against vulnerabilities like XSS and SQL injection, resulting in safer and more efficient development.</p>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
