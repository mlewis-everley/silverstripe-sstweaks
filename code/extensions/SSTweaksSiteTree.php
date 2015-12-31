<?php
/**
 * Add additional variables to default siteconfig
 *
 * @author morven
 */
class SSTweaksSiteTree extends DataExtension
{
    public static $db = array(
        "SummaryContent"    => "Text",
        "ShowChildren"      => "Boolean",
        "ShowContact"       => "Boolean"
    );

    public static $has_one = array(
        "SummaryImage"      => "Image"
    );

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName("SummaryContent");
        $fields->removeByName("SummaryImage");

        $summary_fields = ToggleCompositeField::create('Summary', 'Summary Info.',
            array(
                TextareaField::create("SummaryContent", $this->owner->fieldLabel('SummaryContent')),
                UploadField::create("SummaryImage", $this->owner->fieldLabel('SummaryImage'))
            )
        )->setHeadingLevel(4);

        $fields->addFieldToTab('Root.Main', $summary_fields, 'Metadata');
    }

    public function updateSettingsFields(FieldList $fields)
    {
        $children = FieldGroup::create(
            CheckboxField::create('ShowChildren', 'Show children in the content area?')
        )->setTitle('Children of this page');

        $fields->addFieldToTab('Root.Settings', $children);

        $contact = FieldGroup::create(
            CheckboxField::create('ShowContact', 'Show contact info on this page?')
        )->setTitle('Contact Info (from settings)');

        $fields->addFieldToTab('Root.Settings', $contact);
    }
}
