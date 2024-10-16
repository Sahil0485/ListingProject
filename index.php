<?php include './includes/header.php'; ?>

<div class="main-header-section">
    <div class="container">
        <div class="header-content-block">
            <div class="header-title-block">
                <h2>Explore Your City</h2>
                <p>Discover what makes feel better nearest you.</p>
            </div>
            <form class="form-common filter-form filter-header-form">
                <div class="form-group outer-select-field">
                    <a class="input-dropedown-btn catagory-btn" href="javascript:void(0)">
                        <i class="fa fa-bars" aria-hidden="true"></i> Categories
                    </a>
                    <input type="text" class="outer-select-input-box" id="listing_catagory_list"
                        placeholder="Ex: Food, Drink" />
                </div>
                <div class="form-group outer-select-field">
                    <a class="input-dropedown-btn location-btn" href="javascript:void(0)">
                        <i class="fa fa-crosshairs" aria-hidden="true"></i> Location
                    </a>
                    <input type="text" class="outer-select-input-box" id="listing_location_list"
                        placeholder="Ex: Food, Drink" />
                </div>
                <div class="form-group outer-select-field">
                    <a class="input-dropedown-btn" href="javascript:void(0)">
                        <i class="fa fa-crosshairs" aria-hidden="true"></i> Keword
                    </a>
                    <input type="text" class="outer-select-input-box" id="listing_keword"
                        placeholder="Ex: Food, Drink" />
                </div>
                <div class="btn-group">
                    <button type="submit" class="danger-btn">
                        <i class="ti-search" aria-hidden="true"></i>
                        Search
                    </button>
                </div>
            </form>
            <p class="listing-promote-text">
                Or Add & Promote your own listing and see what’s happening around you.
            </p>
            <div class="listing-promote-steps">
                <div class="listing-promote-block">
                    <span class="ti-user"></span>
                    <p>Register</p>
                </div>
                <div class="listing-promote-block">
                    <span class="ti-pencil-alt"></span>
                    <p>Create Listing</p>
                </div>
                <div class="listing-promote-block">
                    <span class="ti-announcement"></span>
                    <p>Publish</p>
                </div>
            </div>
        </div>
        <!-- header-content-block -->
    </div>
    <div class="overlay"></div>
</div>

<?php include './includes/footer.php'; ?>