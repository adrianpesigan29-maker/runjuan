<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Run Juan – Coming Soon</title>
    <style>
        :root {
            --bg: #0a0a0a;
            --text: #ffffff;
            --accent: #00ff9d;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.6;
        }
        .container {
            text-align: center;
            padding: 2rem;
            max-width: 90%;
        }
        h1 {
            font-size: clamp(3rem, 10vw, 7rem);
            font-weight: 800;
            margin-bottom: 1rem;
            letter-spacing: -2px;
        }
        p {
            font-size: 1.5rem;
            opacity: 0.85;
            margin-bottom: 1rem;
        }
        .tagline {
            font-size: 1.2rem;
            opacity: 0.7;
            font-style: italic;
        }
        .status {
            margin-top: 4rem;
            font-size: 1rem;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Run Juan</h1>
        <p>Minimalist running log & micro-blog</p>
        <p class="tagline">One run. One post. One life.</p>
        <div class="status">
            Local dev environment → <strong>WORKING ✓</strong>
        </div>
    </div>
</body>
</html>