<?php
/**
 * Add additional variables to default siteconfig
 *
 * @author morven
 */
class SSTweaksSiteConfig extends DataExtension {
    
    static $db = array(
        "FooterContent"         => "HTMLText",
    );

    static $has_one = array(
        'Logo'          => 'Image'
    );

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab('Root.Main', UploadField::create('Logo')->setFolderName('logos'));


        $footer_fields = ToggleCompositeField::create('FooterInfo', 'Footer',
            array(
                HTMLEditorField::create('FooterContent','Content to appear in footer')->setRows(15)->addExtraClass('stacked')
            )
        )->setHeadingLevel(4);

        $fields->addFieldToTab('Root.Main', $footer_fields);
    }
}

