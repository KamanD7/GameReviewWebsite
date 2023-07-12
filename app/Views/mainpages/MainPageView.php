<!DOCTYPE html>
<html>
<head>
    <title>Game List</title>
    <style>
        .game {
            display: flex;
            margin-bottom: 20px;
        }

        .cover {
            width: 50px;
            height: 75px;
            margin-right: 10px;
        }

        .details {
            flex-grow: 1;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .description {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Game List</h1>
    <div id="gameList">
        <?php foreach ($gameList as $game): ?>
            <div class="game">
                <div class="cover">
                    <?php if (isset($game['cover']) && isset($game['cover']['image_id'])): ?>
                        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/<?php echo $game['cover']['image_id']; ?>.jpg">
                    <?php else: ?>
                        <img src="https://example.com/placeholder-image.jpg">
                    <?php endif; ?>
                </div>
                <div class="details">
                    <div class="title"><?php echo $game['name']; ?></div>
                    <div class="description"><?php echo $game['summary']; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php else: ?>
    <h3>No games can be found</h3>
<?php endif ?>
</body>
</html>