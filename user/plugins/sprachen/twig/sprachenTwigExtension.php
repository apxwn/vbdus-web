<?php
namespace Grav\Plugin;
class sprachenTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'sprachenTwigExtension';
    }
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('sprachen', [$this, 'sprachenFunction']),
            new \Twig_SimpleFunction('accentsort', [$this, 'accentFunction'])
        ];
    }
    public function sprachenFunction($lang, $disp_lang)
    {
        return locale_get_display_language($lang, $disp_lang);
    }
    public function accentFunction($array, $disp_lang)
    {
        $coll = collator_create($disp_lang);
        collator_asort( $coll, $array );
        return( $array );
    }
}
