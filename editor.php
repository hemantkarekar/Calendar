<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/fabric.min.js"></script>
    <title>My2021Calendar - Studio</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/layouts.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8YYX5CSXC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q8YYX5CSXC');
    </script>
</head>

<body>
    <?php include("includes/layouts/header.php");
    $_SESSION["username"] = "trial";
    if (!isset($_SESSION["username"])) {
        echo "<script>location.href = 'index.php'</script>";
    }
    ?>
    <main role="main" class="editor py-3">
        <div class="container-fluid">
            <div class="container py-3 editor-wrap">
                <div class="alert-page" id="alert">
                    <div class="alert-dialgue">
                        <p class="message">
                            Please Wait ...
                        </p>
                    </div>
                </div>
                <form action="generatePDF.php" class="py-3" method="POST" enctype="multipart/form-data">
                    <div class="card my-1">
                        <div class="card-header card-title">
                            Choose Calendar Design
                        </div>
                        <div class="card-body">
                            <div class="container templates-grid">
                                <div class="row template-wrap">
                                    <div class='col-lg-6 col-sm-12 template text-center'>
                                        <a href="#">
                                            <img src="assets\images\templates\libs\01.png" alt="" id="template1">
                                            <label for="template1">Frost Template</label>
                                        </a>

                                    </div>
                                    <div class='col-lg-6 col-sm-12 template text-center'>
                                        <a href="#">
                                            <img src="assets\images\templates\libs\02.png" alt="" id="template2">
                                            <label for=template2>Sunshine Template</label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;">
                                <input type="radio" name="templateradio" value="1" id="tempradio1" autocomplete="off" checked>
                                <input type="radio" name="templateradio" value="2" id="tempradio2" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="card p-0" id="editor-window">
                        <div class="card-header card-title">
                            Enter Calendar Data
                        </div>
                        <div class="card-body">
                            <div id="thankyou_jumbo" style="display: none;">
                                <div class="jumbotron text-center">
                                    <h1>Thank You!</h1>
                                    <p class="lead"> All pages have been successfully submitted.</p>
                                    <p class="lead"> Click "Download Calendar" to download your calendar as PDF.</p>
                                    <hr class="my-4">
                                    <p id="wait-messgage" style="display: none;">Download should start soon...</p>
                                </div>
                            </div>
                            <div class="card my-2" id="template_container">
                                <div class="card-header card-title section-title">
                                    <label id="month-id">Cover Page</label>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1" style="margin-bottom: 0;">Upload Doctor Image</label>
                                                <small id="emailHelp" class="form-text text-muted">
                                                    *Recommended Image Size Width-800 & Height-1060.
                                                </small>
                                                <!--<small id="emailHelp" class="form-text text-muted">
                                                    *Recommended Image Format JPG/JPEG and PNG.
                                                </small>-->
                                                <input type="file" accept="image/x-png,image/jpeg" class="form-control-file" name="pageImg" id="pageImg">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Enter Caption:</label>
                                                <textarea class="form-control" name="pageQuote" id="pageQuote" maxlength="75" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="pageSection">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Add a special day (like Birthday, Anniversary, etc.,):</label>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="pageSM" id="pageSM" rows="3" placeholder="31/06/2021 - Happy Birthday"></textarea>
                                                <input type="button" class="form-control btn btn-primary my-2" id="placeDate" value="Add Date"></div>
                                        </div>
                                    </div>
                                    <small class="text-muted">
                                        <b>GUIDES:</b><br>
                                        Before editing existing data you need to remove previous data from preview page.
                                    </small>
                                </div>
                            </div>
                            <div class="form-group my-3 text-center" id="downld">
                                <input type="button" id="nxtbtn" class="btn btn-secondary btn-lg m-1" name="submit" value="Add Page" onclick="renderCanvas()" />
                                <button type="reset" id="resetbtn" class="btn btn-danger btn-lg m-1" onclick="location.reload();">Reset Data</button>
                                <input type="submit" id="downloadbtn" class="btn btn-primary btn-lg m-1" name="submit" value="Download Calendar" />
                            </div>
                        </div>
                    </div>
                </form>
                <div class="view" id="sample">
                    <div class="canvas-wrap row">
                        <div class="col-12">
                            <div class="canvas">
                                <canvas id="preview" height="1650" width="2550"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/canvas.js"></script>
</body>

</html>