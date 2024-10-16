<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/auth.php" ?>

<div class="subheader">
    <h2>Submit Your Lisiting</h2>
    <div class="overlay"></div>
</div>
<div class="breadcrumb-block">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="single-listing.php">Listing </a></li>
            <li class="breadcrumb-item active">Add Listing</li>
        </ol>
        <div class="breadcrumb-call-to-action">
            <p><i class="fa fa-phone" aria-hidden="true"></i> +1-0000-000-000</p>
            <a href="javascript:void(0)" class="listing-btn-large">
                Save & Preview
            </a>
        </div>
    </div>
</div>
<div class="add-listing-wrap">
    <div class="container">
        <br>
        <!-- add-listing-tost-block -->
        <form id="add_listing_form" class="form-common add-listing-form" action="#" novalidate="novalidate">
            <div class="listing-block businessinfo-listing">
                <h4>Business Information</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="businessinfo-left-block">
                            <div class="form-group">
                                <label for="listing_name">Listing Name</label>
                                <input id="listing_name" type="text" class="form-control form-single-element"
                                    placeholder="Ex: Anderson Hotel" aria-required="true">
                                <input id="listing_tagline" type="text" class="form-control"
                                    placeholder="Business Tagline goes here" aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="listing_email">Contact Email</label>
                                <input id="listing_email" type="email" class="form-control"
                                    placeholder="Ex: info@example.com" aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="listing_phone_no">Contact Phone</label>
                                <input id="listing_phone_no" type="text" class="form-control"
                                    placeholder="Ex: +1-0000-000-000" aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="listing_website">Website</label>
                                <input id="listing_website" type="text" class="form-control"
                                    placeholder="Ex: www.example.com" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <!-- col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="businessinfo-right-block">
                            <div id="add_listing_map" class="add-listing-map"></div>
                            <div class="form-group">
                                <label for="listing_address">Location (Full Address)</label>
                                <input id="listing_address" type="text" class="form-control"
                                    placeholder="Find your place in gogle map" aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="listing_region">Listing Region</label>
                                <input id="listing_region" type="text" class="form-control"
                                    placeholder="Select your listing region" aria-required="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- businessinfo-listing -->
            <div class="listing-block Others-Information-listing">
                <h4>Others Information</h4>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="listing_category">Category</label>
                            <select id="listing_category" class="form-control">
                                <option>Default select</option>
                                <option>First select</option>
                                <option>Second select</option>
                                <option>Third select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="listing_price">Price</label>
                            <select id="listing_price" class="form-control">
                                <option>Default select</option>
                                <option>Price One</option>
                                <option>Price Two</option>
                                <option>Price Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group listing-price">
                            <input id="listing_price_from" type="text" class="form-control" placeholder="Price From"
                                aria-required="true">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group listing-price">
                            <input id="listing_price_to" type="text" class="form-control" placeholder="Price To"
                                aria-required="true">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="listing-features-block">
                            <h5>Select listing features</h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- block-checkbox block -->
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- block-checkbox block -->
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- block-checkbox block -->
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Air Conditioned</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- block-checkbox block -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- listing-features-block -->
                        <div class="listing-additionalinfo-block">
                            <h5>Aditional info</h5>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group additionalinfo-toggle-switch">
                                                <input type="checkbox" checked id="aditionalInfo1">
                                                <label for="aditionalInfo1">Pet Friendly</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group additionalinfo-toggle-switch">
                                                <input type="checkbox" checked id="aditionalInfo2">
                                                <label for="aditionalInfo2">Wheel Accessible</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group additionalinfo-toggle-switch">
                                                <input type="checkbox" id="aditionalInfo3">
                                                <label for="aditionalInfo3">Child Friendly</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group additionalinfo-toggle-switch">
                                                <input type="checkbox" checked id="aditionalInfo4">
                                                <label for="aditionalInfo4">First Aid Service</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group additionalinfo-toggle-switch">
                                                <input type="checkbox" checked id="aditionalInfo5">
                                                <label for="aditionalInfo5">Fire Safety</label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- listing-additionalinfo-block -->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input id="listing_others" type="text" class="form-control" placeholder="Others"
                                aria-required="true">
                        </div>
                        <div class="listing-businesshour-block">
                            <h5>Business Hours</h5>
                            <div class="form-check">
                                <div class="multiple-label-checkbox-block">
                                    <p><strong>Monday [+]</strong> 08:00 <b>-</b> 10:00</p>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Closed</span>
                                    </label>
                                </div>
                                <div class="multiple-label-checkbox-block">
                                    <p><strong>Tuesday [+]</strong> 08:00 <b>-</b> 10:00</p>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Closed</span>
                                    </label>
                                </div>
                                <div class="multiple-label-checkbox-block">
                                    <p><strong>Wednesday [+]</strong> 08:00 <b>-</b> 10:00</p>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Closed</span>
                                    </label>
                                </div>
                                <div class="multiple-label-checkbox-block">
                                    <p><strong>Thursday [+]</strong> 08:00 <b>-</b> 10:00</p>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Closed</span>
                                    </label>
                                </div>
                                <div class="multiple-label-checkbox-block">
                                    <p><strong>Frinday [+]</strong> 08:00 <b>-</b> 10:00</p>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Closed</span>
                                    </label>
                                </div>
                                <div class="multiple-label-checkbox-block">
                                    <p><strong>Saturday [+]</strong> 08:00 <b>-</b> 10:00</p>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Closed</span>
                                    </label>
                                </div>
                                <div class="multiple-label-checkbox-block">
                                    <p><strong>Sunday [+]</strong> 08:00 <b>-</b> 10:00</p>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Closed</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- listing-businesshour-block -->
                        <div class="form-group time-zone-block">
                            <label for="listing_timezone">Time Zone</label>
                            <select id="listing_timezone" class="form-control">
                                <option>Select your business time zone.. Ex: UTC +0</option>
                                <option>Select your business time zone.. Ex: UTC +10</option>
                                <option>Select your business time zone.. Ex: UTC +20</option>
                                <option>Select your business time zone.. Ex: UTC +30</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Others-Information-listing -->
            <div class="listing-block details-listing">
                <h4>Listing Details</h4>
                <div class="form-group listing-compose-block">
                    <label for="listing_descreption">Description</label>
                    <textarea rows="5" cols="50" id="listing_descreption" class="form-control compose-box"
                        placeholder="Comma Seperated Ex:  Real Estate, Construction"></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group textarea-form-group">
                            <label for="listing_kewords">Keywords</label>
                            <textarea rows="5" cols="50" id="listing_kewords" class="form-control"
                                placeholder="Comma Seperated Ex:  Real Estate, Construction"></textarea>
                        </div>
                        <div class="promotional-video-block form-group">
                            <label for="listing_youtube_video_1">Promotional Video</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="listing_youtube_video_1" type="text" class="form-control"
                                            placeholder="YouTube Video URL Here" aria-required="true">
                                    </div>
                                    <div class="form-group">
                                        <input id="listing_youtube_video_2" type="text" class="form-control"
                                            placeholder="YouTube Video URL Here" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="listing_youtube_video_3" type="text" class="form-control"
                                            placeholder="YouTube Video URL Here" aria-required="true">
                                    </div>
                                    <div class="form-group">
                                        <input id="listing_youtube_video_4" type="text" class="form-control"
                                            placeholder="YouTube Video URL Here" aria-required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="listing_faq">FAQ</label>
                            <input id="listing_faq" type="text" class="form-control" placeholder="Question"
                                aria-required="true">
                        </div>
                        <div class="form-group textarea-form-group">
                            <textarea rows="5" cols="50" id="listing_answer" class="form-control"
                                placeholder="Answer"></textarea>
                        </div>
                        <button type="button" class="listing-btn-large">+ Add New</button>
                    </div>
                    <div class="col-lg-6">
                        <div class="social-profile-block form-group">
                            <label for="listing_facebook_url">Social Profile</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="listing_facebook_url" type="text" class="form-control"
                                            placeholder="Facebook URL" aria-required="true">
                                    </div>
                                    <div class="form-group">
                                        <input id="listing_twitter_url" type="text" class="form-control"
                                            placeholder="Twitter URL" aria-required="true">
                                    </div>
                                    <div class="form-group">
                                        <input id="listing_instagram_url" type="text" class="form-control"
                                            placeholder="Instagram URL" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="listing_googleplus_url" type="text" class="form-control"
                                            placeholder="Google Plus URL" aria-required="true">
                                    </div>
                                    <div class="form-group">
                                        <input id="listing_youtube_url" type="text" class="form-control"
                                            placeholder="YouTube URL" aria-required="true">
                                    </div>
                                    <div class="form-group">
                                        <input id="listing_linkedin_url" type="text" class="form-control"
                                            placeholder="Linkedin URL" aria-required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uload-images-block">
                            <h5>Upload Images</h5>
                            <div class="form-group form-group-file-type">
                                <label for="listing_company_logo">Company Logo</label>
                                <input type="file" accept="image/*" class="form-control-file" id="listing_company_logo">
                                <span>Maximum file size: 20 MB.</span>
                            </div>
                            <div class="form-group form-group-file-type">
                                <label for="listing_company_cover_photo">Cover Image</label>
                                <input type="file" accept="image/*" class="form-control-file" id="listing_company_cover_photo">
                                <span>Maximum file size: 20 MB.</span>
                            </div>
                            <div class="form-group form-group-file-type">
                                <label for="listing_company_slide_photo">Slide Show Images</label>
                                <input type="file" accept="image/*" class="form-control-file" id="listing_company_slide_photo">
                                <span>Maximum file size: 90 MB.</span>
                            </div>
                            <div class="form-group form-group-file-type">
                                <label for="listing_company_gallary_photo">Gallery Images (optional)</label>
                                <input type="file" accept="image/*" class="form-control-file" id="listing_company_gallary_photo">
                                <span>Maximum file size: 90 MB.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- details-listing -->
            <div class="listing-block attach-document-listing">
                <h4>Attach Documents</h4>
                <div class="form-group form-group-file-type">
                    <label for="listing_company_profile">Company Profile</label>
                    <input type="file" accept="image/*" class="form-control-file" id="listing_company_profile">
                    <span>File Format .pdf, .doc, .docx, .ppt, .pptx, .jpeg, .png</span>
                </div>
                <div class="form-group form-group-file-type">
                    <label for="listing_company_brochure">Company Brochure</label>
                    <input type="file" accept="image/*" class="form-control-file" id="listing_company_brochure">
                    <span>File Format .pdf, .doc, .docx, .ppt, .pptx, .jpeg, .png</span>
                </div>
                <div class="form-group form-group-file-type">
                    <label for="listing_company_resturant">Food Menu (Restaurant)</label>
                    <input type="file" accept="image/*" class="form-control-file" id="listing_company_resturant">
                    <span>File Format .pdf, .doc, .docx, .ppt, .pptx, .jpeg, .png</span>
                </div>
                <div class="form-group form-group-file-type">
                    <label for="listing_company_document">Others Document</label>
                    <input type="file" accept="image/*" class="form-control-file" id="listing_company_document">
                    <span>File Format .pdf, .doc, .docx, .ppt, .pptx, .jpeg, .png</span>
                </div>
            </div>
            <!-- attach-document-listing -->
            <div class="listing-block prview-listing">
                <h4>Enter your information to Sign up & get approval notification</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="listing_user_name">Your Name</label>
                            <input id="listing_user_name" type="text" class="form-control"
                                placeholder="Enter your full name here" aria-required="true">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="listing_user_email">Email</label>
                            <input id="listing_user_email" type="email" class="form-control"
                                placeholder="Enter your email here" aria-required="true">
                        </div>
                    </div>
                </div>
                <h4 class="text-center">To Review your listing click the button below</h4>
                <button type="submit" class="listing-btn-large">Save & Preview</button>
            </div>
            <!-- prview-listing -->
        </form>
    </div>
</div>

<?php include_once "./includes/footer.php" ?>