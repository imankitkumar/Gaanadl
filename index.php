<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaanadl V2.0</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <span>Gaana</span> Music Downloader
    </header>

    <main>

        <form action="#" method="GET">
            <input type="text" spellcheck="false" required placeholder="Enter song name, author name or album name." />

            <button type="submit">
                <span class="material-icons">
                    search
                </span>
            </button>
        </form>

        <div id="results"></div>

    </main>
    <script defer src="main.js"></script>
</body>

</html>
