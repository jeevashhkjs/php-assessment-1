<html>
<head>
    <title>Home Page</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="requestPremium">
            <?php if($preornot): ?>
                <form action="/requestPremium" method="post">
                    <button name="userId" value="<?php echo $_SESSION['userName'] ?>" type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Get Premium
                    </button>
                </form>
            <?php endif; ?>
        </div>
        <div class="songs">
            <ol class="list-decimal">
                <?php foreach($allsongs as $songs=>$values): ?>
                <li><?php echo $values->SongsName ?></li><span><?php echo $values->artistsName ?></span>
                <?php if(!$preornot && isset($_SESSION['userName'])): ?>
                    <form action="/sharedUsers" method="post">
                        <button name="songId" type="submit" value="<?php echo $values->songsId ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            Share
                        </button>
                    </form>
                <?php endif; ?>
                <?php endforeach; ?>
            </ol>
        </div>
        <?php if(isset($_SESSION['userName'])): ?>
            <div class="shareSongsList">
                <h4 class="text-2xl font-bold dark:text-white">Share Songs Lists</h4>
                <ol>
                    <?php foreach($shareSongs as $shareSongs=>$songsValue): ?>
                        <li><?php echo $songsValue->song_path ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <div class="loginLogou">
                <form action="/logout" method="post">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Log out
                    </button>
                </form>
            <div class="createList">
                <form action="/createplaylist" method="post">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Create PlayList
                    </button>
                </form>
                <form action="/getPlayListSong" method="post">
                    <?php foreach($playListsName as $playList=>$valueses): ?>
                        <h4><?php echo $valueses->name ?></h4>
                    <?php endforeach; ?>
                    <?php foreach($playLists as $list=>$listName): ?>
                        <button type="submit" value="<?php echo $listName->id ?>" name="listId" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"><?php echo $listName->name ?></button>
                    <?php endforeach; ?>
                </form>
                <?php foreach($songsList as $songs => $songsList): ?>
                    <li><?php echo $songsList->song_path ?></li>
                <?php endforeach; ?>
            </div>
                <?php else: ?>
                <form action="/login" method="post">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Log in
                    </button>
                </form>
            </div>
        <?php endif; ?>
        <form action="/signup" method="post">
            <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Sign Up
            </button>
        </form>
    </div>
</body>
</html>