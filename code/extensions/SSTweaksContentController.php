<?php
/**
 * Add additional methods to controller
 *
 * @author morven
 */
class SSTweaksContentController extends Extension {
    public function SocialNav() {
        $config = SiteConfig::current_site_config();

        $vars = array(
            "Facebook"  => ($config->FacebookURL) ? $config->FacebookURL : "",
            "Twitter"   => ($config->TwitterURL) ? $config->TwitterURL : "",
            "GooglePlus"=> ($config->GooglePlusURL) ? $config->GooglePlusURL : "",
            "LinkdIn"   => ($config->LinkdInURL) ? $config->LinkdInURL : "",
            "YouTube"   => ($config->YouTubeURL) ? $config->YouTubeURL : "",
            "Pinterest" => ($config->PinterestURL) ? $config->PinterestURL : ""
        );

        $this->owner->extend("UpdateSocialNav", $vars);

        return $this->owner->renderWith("SocialNav", $vars);
    }
}
