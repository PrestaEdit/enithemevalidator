<?php

class EniThemeValidator extends Module
{
    public function __construct()
    {
        $this->name = 'enithemevalidator';

        parent::__construct();
    }
    public function getContent()
    {
        $themeName = 'eni';

        $themeManagerBuilder = new \PrestaShop\PrestaShop\Core\Addon\Theme\ThemeManagerBuilder(Context::getContext(), Db::getInstance());

        $themeInstance = $themeManagerBuilder->buildRepository()->getInstanceByName($themeName);

        $themeValidator = new \PrestaShop\PrestaShop\Core\Addon\Theme\ThemeValidator(Context::getContext()->getTranslator(), new \PrestaShop\PrestaShop\Adapter\Configuration());

        $isValid = $themeValidator->isValid($themeInstance);

        if (!$isValid) {
            return "Theme is not valid.";
        }

        return "Theme is valid.";
    }
}