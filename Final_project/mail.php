<html>

<head>
    <title>Contact Form Tutorial by Bootstrapious.com</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2">

                

                <p class="lead">Για οποιαδήποτε απορία επικοινωνήστε μαζί μας.</p>


                <form id="contact-form" method="post" action="contact.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name">Όνομα *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Παρακαλώ εισάγετε όνομα *" required="required"
                                        data-error="Απαιτείται έγκυρο όνομα.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_lastname">Επώνυμο *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Παρακαλώ εισάγετε επώνυμο *" required="required"
                                        data-error="Απαιτείται έγκυρο επώνυμο.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Παρακαλώ εισάγετε email *" required="required"
                                        data-error="Απαιτείται έγκυρο email.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_phone">Τηλέφωνο</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Παρακαλώ εισάγετε τηλέφωνο">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form_message">Μήνυμα *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Παρακαλώ εισάγετε το μήνυμά σας *" rows="4" required="required"
                                data-error="Παρακαλώ εισάγετε μήνυμα."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Le6_4IUAAAAACgnj-cnOR5G9qXRZMxQnHwQmfc0" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                        </div>


                        <input type="submit" class="btn btn-success btn-send" value="Υποβολή">

                        <p class="text-muted">
                            <strong>*</strong> Τα πεδία είναι υποχρεωτικά.
                        </p>

                    </div>

                </form>

            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="validator.js"></script>
    <script src="contact.js"></script>
</body>

</html>