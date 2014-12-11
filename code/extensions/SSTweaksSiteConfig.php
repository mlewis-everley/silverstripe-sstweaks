<?php
/**
 * Add additional variables to default siteconfig
 *
 * @author morven
 */
class SSTweaksSiteConfig extends DataExtension {
    public static $db = array(
        "FooterContent"         => "HTMLText",
        "ContactEmail"          => "Varchar(100)",
        "ContactPhone"          => "Varchar(50)",
        "ContactAddress"        => "Text",
        "MiscContactInfo"       => "Text",
        "MapHTML"               => "HTMLText",
        "CustomMaxWidth"        => "Int",
        "CustomMainBackground"  => "Varchar(7)",
        "CustomBodyBackground"  => "Varchar(7)",
        "CustomHeadBackground"  => "Varchar(7)",
        "CustomFootBackground"  => "Varchar(7)"
    );

    public static $has_one = array(
        'Logo'          => 'Image'
    );

    public function ContactAddressXML() {
        return (nl2br(Convert::raw2xml ($this->owner->ContactAddress), true));
    }

    public function MiscContactInfoXML() {
        return (nl2br(Convert::raw2xml ($this->owner->MiscContactInfo), true));
    }

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab('Root.Main', UploadField::create('Logo')->setFolderName('logos'));


        $footer_fields = ToggleCompositeField::create('FoooterInfo', 'Footer',
            array(
                HTMLEditorField::create('FooterContent','Content to appear in footer')->setRows(15)->addExtraClass('stacked')
            )
        )->setHeadingLevel(4);

        $contact_fields = ToggleCompositeField::create('ContactInfo', 'Contact Info.',
            array(
                TextAreaField::create('ContactAddress', $this->owner->fieldLabel('ContactAddress')),
                TextField::create('ContactEmail', $this->owner->fieldLabel('ContactEmail')),
                TextField::create('ContactPhone', $this->owner->fieldLabel('ContactPhone')),
                TextAreaField::create('MiscContactInfo', $this->owner->fieldLabel('MiscContactInfo')),
                TextAreaField::create('MapHTML', "HTML to be loaded for mapping info")
            )
        )->setHeadingLevel(4);

        $theme_custom_fields = ToggleCompositeField::create('CustomTheme', 'Theme Customisation',
            array(
                TextField::create('CustomMainBackground', $this->owner->fieldLabel('CustomMainBackground')),
                TextField::create('CustomBodyBackground', $this->owner->fieldLabel('CustomBodyBackground')),
                TextField::create('CustomHeadBackground', $this->owner->fieldLabel('CustomHeadBackground')),
                TextField::create('CustomFootBackground', $this->owner->fieldLabel('CustomFootBackground')),
                TextField::create('CustomMaxWidth', $this->owner->fieldLabel('CustomMaxWidth'))
            )
        )->setHeadingLevel(4);

        $fields->addFieldToTab('Root.Main', $footer_fields);
        $fields->addFieldToTab('Root.Main', $contact_fields);
        $fields->addFieldToTab('Root.Main', $theme_custom_fields);
    }
}

