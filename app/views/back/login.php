<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — Cabinet Dr. Dupont</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            color: #185FA5;
            margin-bottom: 8px;
            font-size: 22px;
        }
        p.subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .error {
            background: #fee2e2;
            color: #a32d2d;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #333;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 20px;
            outline: none;
        }
        input:focus { border-color: #185FA5; }
        button {
            width: 100%;
            padding: 12px;
            background: #185FA5;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }
        button:hover { background: #0c447c; }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Cabinet Dr. Dupont</h1>
        <p class="subtitle">Accès administration</p>

        <?php if (isset($error)) : ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?url=login-post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="admin@cabinet.fr" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>

            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>