<?php
// news.php
session_start();
$loggedIn = isset($_SESSION['user_id']);
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?message=login_required');

    exit();
}

// Fetch news from News API using cURL
$apiKey = '892ea8cecb2e48e78d7b06a2c09685f4';
$newsApiUrl = 'https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $apiKey;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $newsApiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: MyNewsApp/1.0'
]);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    $newsData = json_decode($response, true);
    $articles = isset($newsData['articles']) ? $newsData['articles'] : [];
}

curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .article {
            display: flex;
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
            align-items: center;
        }
        .article img {
            max-width: 150px;
            height: auto;
            margin-right: 20px;
        }
        .article-content {
            flex: 1;
        }
        .article h2 {
            margin: 0 0 10px;
            font-size: 1.5em;
        }
        .article p {
            margin: 0 0 10px;
        }
        .article a {
            color: #1a0dab;
            text-decoration: none;
        }
        .article a:hover {
            text-decoration: underline;
        }
        .logout {
            display: block;
            text-align: right;
            margin-bottom: 20px;
        }
        .logout a {
            color: #d9534f;
            text-decoration: none;
        }
        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="topnav">
        <a href="index.php">Home</a>
        <a href="news.php">News</a>
        <a href="contact.php">Contact</a>
        <a href="#about">About</a>
        <?php if ($loggedIn): ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="container">
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
        <h1>News Page</h1>
        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <?php if (!empty($article['urlToImage'])): ?>
                    <div class="article">
                        <img src="<?php echo htmlspecialchars($article['urlToImage']); ?>" alt="Article Image">
                        <div class="article-content">
                            <h2><a href="<?php echo htmlspecialchars($article['url']); ?>" target="_blank"><?php echo htmlspecialchars($article['title']); ?></a></h2>
                            <p><?php echo htmlspecialchars($article['description']); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No news articles found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
