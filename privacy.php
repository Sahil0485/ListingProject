<?php include_once './includes/header.php' ?>
<div class="subheader">
    <h2>Privacy Policy</h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Privacy Policy</li>
        </ol>
        <div class="breadcrumb-call-to-action">
            <?php
            $generalContactQuery = $conn->query("SELECT * FROM `contactcategory` WHERE id = '1'");
            $generalContactRow = $generalContactQuery->fetch_assoc();
            ?>
            <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $generalContactRow['phone']; ?></p>
            <a href="javascript:void(0)" class="contact-btn">
                Contact Us
            </a>
        </div>
    </div>
</div>
<div class="single-post-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 push-lg-3">
                <article class="single-post">
                    <div class="about-us-content">
                        <div class="heading-panel">

                            <h3 class="main-title text-left">
                                Privacy Policy </h3>
                        </div>

                        <h3 style="text-align:justify"><strong>1. WHAT DO WE DO WITH YOUR INFORMATION?</strong>
                        </h3>

                        <p style="text-align:justify">When you register with or purchase something from our
                            website www.Yellowpages.in, as part of the registration or buying and selling
                            process, we collect the personal information you give us such as your name, address,
                            email address and other data such as (but not limited to) location, photographs and
                            social media details.</p>

                        <p style="text-align:justify">When you browse our website or contribute content such as
                            ratings, comments, testimonials, we also automatically receive your computer’s
                            internet protocol (IP) address in order to provide us with information that helps us
                            learn about your browser and operating system.</p>

                        <p style="text-align:justify">Email marketing: With your permission, we may send you
                            emails about our website, new products and other updates.</p>

                        <p style="text-align:justify">We also communicate with the users through in-app (mobile
                            application) notifications, SMS, email which may lead to data collected by us from
                            the user such as permissions for sending offers/information from our partners,
                            opinion polls etc</p>

                        <p style="text-align:justify">We show online advertisements &amp; use tracking tools
                            including Google Analytics, cookie tracking, location tracking &amp; access to your
                            phone book (after receiving your explicit consent) &amp; other behavioural tracking
                            when you are using our website or mobile application.</p>

                        <h3 style="text-align:justify"><strong>2. CONSENT</strong></h3>

                        <h4 style="text-align:justify">2.1 How do you get my consent?</h4>

                        <p style="text-align:justify">When you provide us with personal information to complete
                            a transaction, verify your credit card, place an order, arrange for a delivery or
                            return a purchase, we imply that you consent to our collecting it and using it for
                            that specific reason only.</p>

                        <p style="text-align:justify">If we ask for your personal information for a secondary
                            reason, like marketing, we will either ask you directly for your expressed consent,
                            or provide you with an opportunity to say no.</p>

                        <h4 style="text-align:justify">2.2 How do I withdraw my consent?</h4>

                        <p style="text-align:justify">If after you opt-in, you change your mind, you may
                            withdraw your consent for us to contact you, for the continued collection, use or
                            disclosure of your information, at anytime, by contacting us at
                            info@localyellowpages.co.inor mailing us at: Localyellowpages.co.in</p>

                        <h3 style="text-align:justify"><strong>3. DISCLOSURE</strong></h3>

                        <p style="text-align:justify">We may disclose your personal information if we are
                            required by law to do so or if you violate our Terms of Service.</p>

                        <h3 style="text-align:justify"><strong>4. PAYMENT</strong></h3>

                        <p style="text-align:justify">We use Pay U Money for processing payments. We/Pay U Money
                            do not store your card data on their servers. The data is encrypted through the
                            Payment Card Industry Data Security Standard (PCI-DSS) when processing payment. Your
                            purchase transaction data is only used as long as is necessary to complete your
                            purchase transaction. After that is complete, your purchase transaction information
                            is not saved.</p>

                        <p style="text-align:justify">Our payment gateway adheres to the standards set by
                            PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of
                            brands like Visa, MasterCard, American Express and Discover.</p>

                        <p style="text-align:justify">PCI-DSS requirements help ensure the secure handling of
                            credit card information by our website and its service providers.</p>

                        <p style="text-align:justify">For more insight, you may also want to read terms and
                            conditions of Pay U Money on their website www. https://www.payumoney.com/.</p>

                        <h3 style="text-align:justify"><strong>5. THIRD-PARTY SERVICES</strong></h3>

                        <p style="text-align:justify">In general, the third-party providers used by us will only
                            collect, use and disclose your information to the extent necessary to allow them to
                            perform the services they provide to us.</p>

                        <p style="text-align:justify">However, certain third-party service providers, such as
                            payment gateways and other payment transaction processors, have their own privacy
                            policies in respect to the information we are required to provide to them for your
                            purchase-related transactions.</p>

                        <p style="text-align:justify">For these providers, we recommend that you read their
                            privacy policies so you can understand the manner in which your personal information
                            will be handled by these providers.</p>

                        <p style="text-align:justify">In particular, remember that certain providers may be
                            located in or have facilities that are located a different jurisdiction than either
                            you or us. So if you elect to proceed with a transaction that involves the services
                            of a third-party service provider, then your information may become subject to the
                            laws of the jurisdiction(s) in which that service provider or its facilities are
                            located.</p>

                        <p style="text-align:justify">Once you leave our website or are redirected to a
                            third-party website or application, you are no longer governed by this Privacy
                            Policy or our website’s Terms of Service.</p>

                        <p style="text-align:justify">Links : When you click on links on our website, they may
                            direct you away from our site. We are not responsible for the privacy practices of
                            other sites and encourage you to read their privacy statements.</p>

                        <h3 style="text-align:justify"><strong>6. SECURITY</strong></h3>

                        <p style="text-align:justify">To protect your personal information, we take reasonable
                            precautions and follow industry best practices to make sure it is not
                            inappropriately lost, misused, accessed, disclosed, altered or destroyed.</p>

                        <h3 style="text-align:justify"><strong>7. COOKIES</strong></h3>

                        <p style="text-align:justify">We use cookies to maintain session of your user. It is not
                            used to personally identify you on other websites.</p>

                        <h3 style="text-align:justify"><strong>8. AGE OF CONSENT</strong></h3>

                        <p style="text-align:justify">By using this site, you represent that you are at least
                            the age of majority in your state or province of residence, or that you are the age
                            of majority in your state or province of residence and you have given us your
                            consent to allow any of your minor dependents to use this site.</p>

                        <h3 style="text-align:justify"><strong>9. CHANGES TO THIS PRIVACY POLICY</strong></h3>

                        <p style="text-align:justify">We reserve the right to modify this privacy policy at any
                            time, so please review it frequently. Changes and clarifications will take effect
                            immediately upon their posting on the website. If we make material changes to this
                            policy, we will notify you here that it has been updated, so that you are aware of
                            what information we collect, how we use it, and under what circumstances, if any, we
                            use and/or disclose it.</p>

                        <p style="text-align:justify">If our website is acquired or merged with another company,
                            your information may be transferred to the new owners so that we may continue to
                            sell products to you.</p>

                        <h3 style="text-align:justify"><strong>10. QUESTIONS AND CONTACT INFORMATION</strong>
                        </h3>

                        <p style="text-align:justify">If you would like to: access, correct, amend or delete any
                            personal information we have about you, register a complaint, or simply want more
                            information contact our Privacy Compliance Officer at at
                            info@localyellowpages.co.inor by mail at: Localyellowpages.co.in</p>

                        <div class="whitediv">&nbsp;</div>
                    </div>
                </article>
            </div>
            <?php include_once './includes/sidebar.php' ?>
        </div>
    </div>
</div>
<?php include_once './includes/footer.php' ?>