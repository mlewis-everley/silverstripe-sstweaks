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
            "LinkdIn"   => ($config->LinkdInURL) ? $config->LinkdInURL : "",
            "YouTube"   => ($config->YouTubeURL) ? $config->YouTubeURL : "",
            "Pinterest" => ($config->PinterestURL) ? $config->PinterestURL : ""
        );

        return $this->owner->renderWith("SocialNav", $vars);
    }
}
