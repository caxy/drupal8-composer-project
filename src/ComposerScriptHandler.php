<?php

use Composer\Installer\InstallerEvent;
use Composer\Package\Package;

class ComposerScriptHandler
{
    /**
     * This method works around https://github.com/composer/composer/issues/4451.
     *
     * @param InstallerEvent $event
     */
    public static function rewriteInstallerPathForCore(InstallerEvent $event)
    {
        /** @var Package $package */
        $package = $event->getComposer()->getPackage();
        $extra = $package->getExtra();

        // @todo presumptuous assumption about location of this file.
        $path = dirname(__DIR__);

        // @todo Rather than hard code the installer path, find it based on the
        //       package type that will be installed there.
        if (isset($extra['installer-paths']['web/core/'])) {
            $extra['installer-paths'][$path.'/web/core/'] = $extra['installer-paths']['web/core/'];
            unset($extra['installer-paths']['web/core/']);
            $package->setExtra($extra);
        }
    }
}
