<footer>
    <div class="footer-top-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h4 style="color: white">About</h4>
                        <?php
                        $footerAboutQuery = $conn->query("SELECT * FROM `aboutus` WHERE id='1'");
                        $footerAboutRow = $footerAboutQuery->fetch_assoc();
                        ?>
                        <p>
                            <?php custom_echo($footerAboutRow['brief1'], 240) ?>
                            <a href="about-us.php" style="color: #c96e0b; font-size: 18px">Read More</a>
                        </p>
                        <!-- footer-social-block -->
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Useful Links</h4>
                        <ul class="footer-content-list">
                            <li>
                                <a href="about-us.php"> About Us </a>
                            </li>
                            <li>
                                <a href="contact-us.php"> Contact Us </a>
                            </li>
                            <li>
                                <a href="feedback.php"> Feedback </a>
                            </li>
                            <li>
                                <a href="faq.php"> FAQs </a>
                            </li>
                            <li>
                                <a href="privacy.php"> Privacy Policy </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">Categories</h4>
                        <ul class="footer-content-list">
                            <?php
                            $footerCategoryQuery = $conn->query("SELECT * FROM `addcategory` WHERE `status` = 'Active' ORDER BY `name` ASC LIMIT 7");
                            while ($footerCategoryRow = $footerCategoryQuery->fetch_assoc()) {
                                ?>
                                <li>
                                    <a href="sub-category.php?pages=<?php echo $footerCategoryRow['pages'] ?>">
                                        <?php echo $footerCategoryRow['name'] ?> </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php
                $footerContactQuery = $conn->query("SELECT * FROM `contactcategory` WHERE id = '1'");
                $footerContactRow = $footerContactQuery->fetch_assoc();
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h4 style="color: white">Address</h4>
                        <p class="address">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <?php echo $footerContactRow['address']; ?>
                        </p>
                        <p>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <?php echo $footerContactRow['phone']; ?>
                        </p>
                        <p>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <?php echo $footerContactRow['email']; ?>
                        </p>
                        <p>
                            <i class="fa fa-solid fa-globe" aria-hidden="true"></i>
                            <?php echo $footerContactRow['web']; ?>
                        </p>
                        <div class="footer-social-block" style="font-size: 20px; margin-top: 10px">
                            <span> Folow us: </span>
                            <ul class="social">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- footer-social-block -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="footer-main">
            <div>
                <h4>Popular Links</h4>
                <ul>
                    <li>
                        <a title="Packers and Movers in Bangalore"
                            href="https://www.sulekha.com/packers-and-movers/bangalore" tabindex="0">Packers and Movers
                            in Bangalore</a>
                    </li>
                    <li>
                        <a title="Packers and Movers in Mumbai" href="https://www.sulekha.com/packers-and-movers/mumbai"
                            tabindex="0">Packers and Movers in Mumbai</a>
                    </li>
                    <li>
                        <a title="Web Designers in Delhi" href="https://www.sulekha.com/web-design-company/delhi"
                            tabindex="0">Web Designers in Delhi</a>
                    </li>
                    <li>
                        <a title="Pest Control in Bangalore"
                            href="https://www.sulekha.com/pest-control-services/bangalore" tabindex="0">Pest Control in
                            Bangalore</a>
                    </li>
                    <li>
                        <a title="Interior Decorators in Bangalore"
                            href="https://www.sulekha.com/interior-designers-decorators/bangalore" tabindex="0">Interior
                            Decorators in Bangalore</a>
                    </li>
                    <li>
                        <a title="Wedding Caterers in Bangalore"
                            href="https://www.sulekha.com/wedding-catering-services/bangalore" tabindex="0">Wedding
                            Caterers in Bangalore</a>
                    </li>
                    <li>
                        <a title="AWS Training in Hyderabad"
                            href="https://www.sulekha.com/amazon-web-services-training/hyderabad" tabindex="0">AWS
                            Training in Hyderabad</a>
                    </li>
                    <li>
                        <a title="AWS Training in Bangalore"
                            href="https://www.sulekha.com/amazon-web-services-training/bangalore" tabindex="0">AWS
                            Training in Bangalore</a>
                    </li>
                    <li>
                        <a title=".Net Training in Chennai" href="https://www.sulekha.com/dot-net-training/chennai"
                            tabindex="0">.Net Training in Chennai</a>
                    </li>
                    <li>
                        <a title="Java Training in Chennai" href="https://www.sulekha.com/java-j2ee-training/chennai"
                            tabindex="0">Java Training in Chennai</a>
                    </li>
                    <li>
                        <a title="Hadoop training in Thane West"
                            href="https://www.sulekha.com/hadoop-training/thane-west-mumbai" tabindex="0">Hadoop
                            training in Thane West</a>
                    </li>
                    <li>
                        <a title="Flats for sale in Chennai"
                            href="https://property.sulekha.com/apartments-flats-for-sale/chennai" tabindex="0">Flats for
                            sale in Chennai</a>
                    </li>
                    <li>
                        <a title="Flats for Sale in Bangalore"
                            href="https://property.sulekha.com/apartments-flats-for-sale/bangalore" tabindex="0">Flats
                            for Sale in Bangalore</a>
                    </li>
                    <li>
                        <a title="Flats for sale in Hyderabad"
                            href="https://property.sulekha.com/apartments-flats-for-sale/hyderabad" tabindex="0">Flats
                            for sale in Hyderabad</a>
                    </li>
                    <li>
                        <a title="Plots for sale in Chennai"
                            href="https://property.sulekha.com/plots-land-for-sale/chennai" tabindex="0">Plots for sale
                            in Chennai</a>
                    </li>
                    <li>
                        <a title="Plots for sale in Bangalore"
                            href="https://property.sulekha.com/plots-land-for-sale/bangalore" tabindex="0">Plots for
                            sale in Bangalore</a>
                    </li>
                    <li>
                        <a title="Flats for sale in Mumbai"
                            href="https://property.sulekha.com/apartments-flats-for-sale/mumbai" tabindex="0">Flats for
                            sale in Mumbai</a>
                    </li>
                    <li>
                        <a title="Flats for Sale in Pune"
                            href="https://property.sulekha.com/apartments-flats-for-sale/pune" tabindex="0">Flats for
                            Sale in Pune</a>
                    </li>
                    <li>
                        <a title="Flats for sale in Pimpri Chinchwad"
                            href="https://property.sulekha.com/apartments-flats-for-sale/pimprichinchwad"
                            tabindex="0">Flats for sale in Pimpri Chinchwad</a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>Corporate</h4>
                <ul>
                    <li>
                        <a title="About us" href="https://www.sulekha.com/collateral/aboutus" tabindex="0">About us</a>
                    </li>
                    <li>
                        <a title="Careers" href="http://careers.sulekha.com/" tabindex="0">Careers</a>
                    </li>
                    <li>
                        <a title="Contact us" href="https://www.sulekha.com/collateral/contactus" tabindex="0">Contact
                            us</a>
                    </li>
                    <li>
                        <a title="Media coverage" href="https://www.sulekha.com/collateral/press" tabindex="0">Media
                            coverage</a>
                    </li>
                    <li>
                        <a title="Ads&nbsp;/&nbsp;commercials" href="https://www.sulekha.com/collateral/ads"
                            tabindex="0">Ads&nbsp;/&nbsp;commercials</a>
                    </li>
                    <li>
                        <a title="Advertise on Sulekha" href="https://www.sulekha.com/collateral/advertise"
                            tabindex="0">Advertise on Sulekha</a>
                    </li>
                    <li>
                        <a title="Terms &amp; conditions" href="https://www.sulekha.com/collateral/terms"
                            tabindex="0">Terms &amp; conditions</a>
                    </li>
                    <li>
                        <a title="Privacy policy" href="https://www.sulekha.com/collateral/privacy" tabindex="0">Privacy
                            policy</a>
                    </li>
                    <li>
                        <a title="Copyright policy" href="https://www.sulekha.com/collateral/collateralpolicy"
                            tabindex="0">Copyright policy</a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>Top cities (India)</h4>
                <ul>
                    <li>
                        <a href="https://www.sulekha.com/bangalore" title="Sulekha Bangalore" tabindex="0">Bangalore</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/chennai" title="Sulekha Chennai" tabindex="0">Chennai</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/delhi" title="Sulekha Delhi" tabindex="0">Delhi</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/mumbai" title="Sulekha Mumbai" tabindex="0">Mumbai</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/hyderabad" title="Sulekha Hyderabad" tabindex="0">Hyderabad</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/pune" title="Sulekha Pune" tabindex="0">Pune</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/kolkata" title="Sulekha Kolkata" tabindex="0">Kolkata</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/ahmedabad" title="Sulekha Ahmedabad" tabindex="0">Ahmedabad</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/gurgaon" title="Sulekha Gurgaon" tabindex="0">Gurgaon</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/faridabad" title="Sulekha Faridabad" tabindex="0">Faridabad</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/ghaziabad" title="Sulekha Ghaziabad" tabindex="0">Ghaziabad</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/noida" title="Sulekha Noida" tabindex="0">Noida</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/greaternoida" title="Sulekha Greater Noida"
                            tabindex="0">Greater Noida</a>
                    </li>
                    <li>
                        <a data-target=".more-cities" data-sdialog="true" class="more-cities-link" tabindex="0">More
                            cities</a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>Top cities (US)</h4>
                <ul>
                    <li>
                        <a href="https://us.sulekha.com/austin-metro-area" title="Austin" tabindex="0">Austin</a>
                    </li>
                    <li>
                        <a href="https://us.sulekha.com/atlanta-metro-area" title="Atlanta" tabindex="0">Atlanta</a>
                    </li>
                    <li>
                        <a href="https://us.sulekha.com/bay-area" title="Bay Area" tabindex="0">Bay Area</a>
                    </li>
                    <li>
                        <a href="https://us.sulekha.com/boston-metro-area" title="Boston" tabindex="0">Boston</a>
                    </li>
                    <li>
                        <a href="https://us.sulekha.com/chicago-metro-area" title="Chicago" tabindex="0">Chicago</a>
                    </li>
                    <li>
                        <a href="https://us.sulekha.com/los-angeles-metro-area" title="Los Angeles" tabindex="0">Los
                            Angeles</a>
                    </li>
                    <li>
                        <a href="https://us.sulekha.com/new-jersey-area" title="New Jersey" tabindex="0">New Jersey</a>
                    </li>
                    <li>
                        <a href="https://us.sulekha.com/new-york-metro-area" title="New York" tabindex="0">New York</a>
                    </li>
                    <li>
                        <a href="https://us.sulekha.com/toronto-metro-area" title="Toronto" tabindex="0">Toronto</a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>Sulekha domains</h4>
                <ul>
                    <li>
                        <a href="http://property.sulekha.com" title="Sulekha Property" tabindex="0">Property</a>
                    </li>
                    <li>
                        <a href="https://property.sulekha.com/residential-property-for-rent/delhi"
                            title="Rental Properties in Delhi" tabindex="0">Rentals</a>
                    </li>
                    <li>
                        <a href="https://property.sulekha.com/pg-hostels-ads/delhi" title="PG in Delhi"
                            tabindex="0">PG</a>
                    </li>
                    <li>
                        <a href="https://property.sulekha.com/roommates-flatmates-ads/delhi" title="Roommates in Delhi"
                            tabindex="0">Roommates</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/home-services/delhi" title="Sulekha Home services"
                            tabindex="0">Home services</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/business-services/delhi" title="Sulekha Office services"
                            tabindex="0">Office services</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/study-abroad" title="Study Abroad" tabindex="0">Study
                            Abroad</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/education-training/delhi" title="Sulekha Education"
                            tabindex="0">Education</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/wedding-services/" title="Sulekha Wedding Services"
                            tabindex="0">Wedding Services</a>
                    </li>
                    <li>
                        <a href="https://www.sulekha.com/home/" title="Sulekha Home Improvement" tabindex="0">Home
                            Improvement</a>
                    </li>
                    <li>
                        <a href="https://www.capshine.com" title="capshine.com" tabindex="0">Capshine</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 push-md-6">
                    <ul class="footer-nav">
                        <li>
                            <a href="javascript:void(0)"> Legal </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"> Privacy Policy </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"> Terms of Use </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pull-md-6">
                    <p class="copyright-text">
                        Copyright 2022,
                        <a href="javascript:void(0)">FirstPointCreations</a>. All Rights
                        Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>