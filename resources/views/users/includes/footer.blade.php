<footer>
    <div class="footer-inner">
        @include("users.includes.footer-top")
        @include("users.includes.footer-bottom")
        <div class="clearfix">
            <div class="container">
                <div class="nopadding">
                    <div class="privacy-links">
                        <ul class="list-inline">
                            <li><a href="#" target="_blank"> {{ trans("sites.policy") }}</a>
                            <li><a href="#" target="#"> {{ trans("sites.regulation") }}</a>
                        </ul>
                    </div>
                    <div id="footer-framgia">&copy; 2017 Framgia Culinary.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-overlay"></div>
</footer>
