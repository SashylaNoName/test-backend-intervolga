<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="vendor/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Comments</h1>
        
        <form action="vendor/add_comment.php" method="post">
            <textarea name="comment" placeholder="Add your comment" required></textarea>
            <button type="submit">Submit</button>
        </form>
        
        <div class="comments">
            <?php include 'vendor/get_comments.php'; ?>
        </div>
    </div>
</body>
</html>
