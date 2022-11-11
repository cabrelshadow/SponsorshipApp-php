<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="page">
        <asisde class="aside">
            <div class="aside-container">
                <p>
                    Realise par <a href="#">Cabrel Sianou</a> & <a href="https://lndev.me">Leonel Ngoya</a>
                </p>
            </div>
        </asisde>
        <main class="main">
            <div class="main-header">
                <div class="main-header-left">
                    <img src="assets/logo.svg" alt="logo">
                    <span>SponsorShipApp</span>
                </div>
            </div>
            <div class="content">
                <div class="main-container">
                    <div class="main-container-header">
                        <h2>Inscription Filleuls</h2>
                    </div>
                    <form class="main-container-form" method="POST" enctype="multipart/form-data" action="./backend/register.php">
                        <div>
                            <input type="text" placeholder="full name" id="fullname" name="fullname">
                        </div>
                        <div>
                            <select name="faculty">
                                <option value="Faculty" selected="true" disabled="disabled">Faculty</option>
                                <option value="TIC-1">TIC-1</option>
                      
                                <option value="PREPA3IL-1">PREPA3IL-1</option>
                            </select>
                        </div>
                       
                        <div>
                            <input type="email" placeholder="Email" id="email" name="email">
                        </div>
                        <div>
                            <input type="file" id="file" placeholder="Photo" accept="image/*" name="avatar">
                        </div>
                        <div>
                            <input type="tel" id="tel" placeholder="Numero de telephone" name="tel">
                        </div>
                      
                        <button type="submit">Register</button>
                    </form>
                    <div class="main-container-footer">
                        <span>inscrivez vous comme parrain</span>
                        <a href="registerParrain.php">parrain register</a>
                    </div>
                </div>
            </div>
            <p>
                Realise par <a href="#">Cabrel Sianou</a> & <a href="https://lndev.me">Leonel Ngoya</a>
            </p>
        </main>
    </div>
</body>
</html>