<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Intl\Tests\Data\Provider;

use Symfony\Component\Intl\Data\Provider\LanguageDataProvider;
use Symfony\Component\Intl\Intl;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @group legacy
 */
abstract class AbstractLanguageDataProviderTest extends AbstractDataProviderTest
{
    // The below arrays document the state of the ICU data bundled with this package.

    protected static $languages = [
        'aa',
        'ab',
        'ace',
        'ach',
        'ada',
        'ady',
        'ae',
        'aeb',
        'af',
        'afh',
        'agq',
        'ain',
        'ak',
        'akk',
        'akz',
        'ale',
        'aln',
        'alt',
        'am',
        'an',
        'ang',
        'anp',
        'ar',
        'ar_001',
        'arc',
        'arn',
        'aro',
        'arp',
        'arq',
        'ars',
        'arw',
        'ary',
        'arz',
        'as',
        'asa',
        'ase',
        'ast',
        'av',
        'avk',
        'awa',
        'ay',
        'az',
        'az_Arab',
        'ba',
        'bal',
        'ban',
        'bar',
        'bas',
        'bax',
        'bbc',
        'bbj',
        'be',
        'bej',
        'bem',
        'bew',
        'bez',
        'bfd',
        'bfq',
        'bg',
        'bgn',
        'bho',
        'bi',
        'bik',
        'bin',
        'bjn',
        'bkm',
        'bla',
        'bm',
        'bn',
        'bo',
        'bpy',
        'bqi',
        'br',
        'bra',
        'brh',
        'brx',
        'bs',
        'bss',
        'bua',
        'bug',
        'bum',
        'byn',
        'byv',
        'ca',
        'cad',
        'car',
        'cay',
        'cch',
        'ccp',
        'ce',
        'ceb',
        'cgg',
        'ch',
        'chb',
        'chg',
        'chk',
        'chm',
        'chn',
        'cho',
        'chp',
        'chr',
        'chy',
        'cic',
        'ckb',
        'co',
        'cop',
        'cps',
        'cr',
        'crh',
        'crs',
        'cs',
        'csb',
        'cu',
        'cv',
        'cy',
        'da',
        'dak',
        'dar',
        'dav',
        'de',
        'de_AT',
        'de_CH',
        'del',
        'den',
        'dgr',
        'din',
        'dje',
        'doi',
        'dsb',
        'dtp',
        'dua',
        'dum',
        'dv',
        'dyo',
        'dyu',
        'dz',
        'dzg',
        'ebu',
        'ee',
        'efi',
        'egl',
        'egy',
        'eka',
        'el',
        'elx',
        'en',
        'en_AU',
        'en_CA',
        'en_GB',
        'en_US',
        'enm',
        'eo',
        'es',
        'es_419',
        'es_ES',
        'es_MX',
        'esu',
        'et',
        'eu',
        'ewo',
        'ext',
        'fa',
        'fa_AF',
        'fan',
        'fat',
        'ff',
        'fi',
        'fil',
        'fit',
        'fj',
        'fo',
        'fon',
        'fr',
        'fr_CA',
        'fr_CH',
        'frc',
        'frm',
        'fro',
        'frp',
        'frr',
        'frs',
        'fur',
        'fy',
        'ga',
        'gaa',
        'gag',
        'gan',
        'gay',
        'gba',
        'gbz',
        'gd',
        'gez',
        'gil',
        'gl',
        'glk',
        'gmh',
        'gn',
        'goh',
        'gom',
        'gon',
        'gor',
        'got',
        'grb',
        'grc',
        'gsw',
        'gu',
        'guc',
        'gur',
        'guz',
        'gv',
        'gwi',
        'ha',
        'hai',
        'hak',
        'haw',
        'he',
        'hi',
        'hif',
        'hil',
        'hit',
        'hmn',
        'ho',
        'hr',
        'hsb',
        'hsn',
        'ht',
        'hu',
        'hup',
        'hy',
        'hz',
        'ia',
        'iba',
        'ibb',
        'id',
        'ie',
        'ig',
        'ii',
        'ik',
        'ilo',
        'inh',
        'io',
        'is',
        'it',
        'iu',
        'izh',
        'ja',
        'jam',
        'jbo',
        'jgo',
        'jmc',
        'jpr',
        'jrb',
        'jut',
        'jv',
        'ka',
        'kaa',
        'kab',
        'kac',
        'kaj',
        'kam',
        'kaw',
        'kbd',
        'kbl',
        'kcg',
        'kde',
        'kea',
        'ken',
        'kfo',
        'kg',
        'kgp',
        'kha',
        'kho',
        'khq',
        'khw',
        'ki',
        'kiu',
        'kj',
        'kk',
        'kkj',
        'kl',
        'kln',
        'km',
        'kmb',
        'kn',
        'ko',
        'koi',
        'kok',
        'kos',
        'kpe',
        'kr',
        'krc',
        'kri',
        'krj',
        'krl',
        'kru',
        'ks',
        'ksb',
        'ksf',
        'ksh',
        'ku',
        'kum',
        'kut',
        'kv',
        'kw',
        'ky',
        'la',
        'lad',
        'lag',
        'lah',
        'lam',
        'lb',
        'lez',
        'lfn',
        'lg',
        'li',
        'lij',
        'liv',
        'lkt',
        'lmo',
        'ln',
        'lo',
        'lol',
        'lou',
        'loz',
        'lrc',
        'lt',
        'ltg',
        'lu',
        'lua',
        'lui',
        'lun',
        'luo',
        'lus',
        'luy',
        'lv',
        'lzh',
        'lzz',
        'mad',
        'maf',
        'mag',
        'mai',
        'mak',
        'man',
        'mas',
        'mde',
        'mdf',
        'mdr',
        'men',
        'mer',
        'mfe',
        'mg',
        'mga',
        'mgh',
        'mgo',
        'mh',
        'mi',
        'mic',
        'min',
        'mk',
        'ml',
        'mn',
        'mnc',
        'mni',
        'moh',
        'mos',
        'mr',
        'mrj',
        'ms',
        'mt',
        'mua',
        'mus',
        'mwl',
        'mwr',
        'mwv',
        'my',
        'mye',
        'myv',
        'mzn',
        'na',
        'nan',
        'nap',
        'naq',
        'nb',
        'nd',
        'nds',
        'nds_NL',
        'ne',
        'new',
        'ng',
        'nia',
        'niu',
        'njo',
        'nl',
        'nl_BE',
        'nmg',
        'nn',
        'nnh',
        'no',
        'nog',
        'non',
        'nov',
        'nqo',
        'nr',
        'nso',
        'nus',
        'nv',
        'nwc',
        'ny',
        'nym',
        'nyn',
        'nyo',
        'nzi',
        'oc',
        'oj',
        'om',
        'or',
        'os',
        'osa',
        'ota',
        'pa',
        'pag',
        'pal',
        'pam',
        'pap',
        'pau',
        'pcd',
        'pcm',
        'pdc',
        'pdt',
        'peo',
        'pfl',
        'phn',
        'pi',
        'pl',
        'pms',
        'pnt',
        'pon',
        'prg',
        'pro',
        'ps',
        'pt',
        'pt_BR',
        'pt_PT',
        'qu',
        'quc',
        'qug',
        'raj',
        'rap',
        'rar',
        'rgn',
        'rif',
        'rm',
        'rn',
        'ro',
        'ro_MD',
        'rof',
        'rom',
        'root',
        'rtm',
        'ru',
        'rue',
        'rug',
        'rup',
        'rw',
        'rwk',
        'sa',
        'sad',
        'sah',
        'sam',
        'saq',
        'sas',
        'sat',
        'saz',
        'sba',
        'sbp',
        'sc',
        'scn',
        'sco',
        'sd',
        'sdc',
        'sdh',
        'se',
        'see',
        'seh',
        'sei',
        'sel',
        'ses',
        'sg',
        'sga',
        'sgs',
        'sh',
        'shi',
        'shn',
        'shu',
        'si',
        'sid',
        'sk',
        'sl',
        'sli',
        'sly',
        'sm',
        'sma',
        'smj',
        'smn',
        'sms',
        'sn',
        'snk',
        'so',
        'sog',
        'sq',
        'sr',
        'sr_ME',
        'srn',
        'srr',
        'ss',
        'ssy',
        'st',
        'stq',
        'su',
        'suk',
        'sus',
        'sux',
        'sv',
        'sw',
        'sw_CD',
        'swb',
        'syc',
        'syr',
        'szl',
        'ta',
        'tcy',
        'te',
        'tem',
        'teo',
        'ter',
        'tet',
        'tg',
        'th',
        'ti',
        'tig',
        'tiv',
        'tk',
        'tkl',
        'tkr',
        'tl',
        'tlh',
        'tli',
        'tly',
        'tmh',
        'tn',
        'to',
        'tog',
        'tpi',
        'tr',
        'tru',
        'trv',
        'ts',
        'tsd',
        'tsi',
        'tt',
        'ttt',
        'tum',
        'tvl',
        'tw',
        'twq',
        'ty',
        'tyv',
        'tzm',
        'udm',
        'ug',
        'uga',
        'uk',
        'umb',
        'ur',
        'uz',
        'vai',
        've',
        'vec',
        'vep',
        'vi',
        'vls',
        'vmf',
        'vo',
        'vot',
        'vro',
        'vun',
        'wa',
        'wae',
        'wal',
        'war',
        'was',
        'wbp',
        'wo',
        'wuu',
        'xal',
        'xh',
        'xmf',
        'xog',
        'yao',
        'yap',
        'yav',
        'ybb',
        'yi',
        'yo',
        'yrl',
        'yue',
        'za',
        'zap',
        'zbl',
        'zea',
        'zen',
        'zgh',
        'zh',
        'zh_Hans',
        'zh_Hant',
        'zu',
        'zun',
        'zza',
    ];

    protected static $alpha2ToAlpha3 = [
        'aa' => 'aar',
        'ab' => 'abk',
        'af' => 'afr',
        'ak' => 'aka',
        'am' => 'amh',
        'ar' => 'ara',
        'an' => 'arg',
        'as' => 'asm',
        'av' => 'ava',
        'ae' => 'ave',
        'ay' => 'aym',
        'az' => 'aze',
        'ba' => 'bak',
        'bm' => 'bam',
        'be' => 'bel',
        'bn' => 'ben',
        'bi' => 'bis',
        'bo' => 'bod',
        'bs' => 'bos',
        'br' => 'bre',
        'bg' => 'bul',
        'ca' => 'cat',
        'cs' => 'ces',
        'ch' => 'cha',
        'ce' => 'che',
        'cu' => 'chu',
        'cv' => 'chv',
        'kw' => 'cor',
        'co' => 'cos',
        'cr' => 'cre',
        'cy' => 'cym',
        'da' => 'dan',
        'de' => 'deu',
        'dv' => 'div',
        'dz' => 'dzo',
        'el' => 'ell',
        'en' => 'eng',
        'eo' => 'epo',
        'et' => 'est',
        'eu' => 'eus',
        'ee' => 'ewe',
        'fo' => 'fao',
        'fa' => 'fas',
        'fj' => 'fij',
        'fi' => 'fin',
        'fr' => 'fra',
        'fy' => 'fry',
        'ff' => 'ful',
        'gd' => 'gla',
        'ga' => 'gle',
        'gl' => 'glg',
        'gv' => 'glv',
        'gn' => 'grn',
        'gu' => 'guj',
        'ht' => 'hat',
        'ha' => 'hau',
        'he' => 'heb',
        'hz' => 'her',
        'hi' => 'hin',
        'ho' => 'hmo',
        'hr' => 'hrv',
        'hu' => 'hun',
        'hy' => 'hye',
        'ig' => 'ibo',
        'io' => 'ido',
        'ii' => 'iii',
        'iu' => 'iku',
        'ie' => 'ile',
        'ia' => 'ina',
        'id' => 'ind',
        'ik' => 'ipk',
        'is' => 'isl',
        'it' => 'ita',
        'jv' => 'jav',
        'ja' => 'jpn',
        'kl' => 'kal',
        'kn' => 'kan',
        'ks' => 'kas',
        'ka' => 'kat',
        'kr' => 'kau',
        'kk' => 'kaz',
        'km' => 'khm',
        'ki' => 'kik',
        'rw' => 'kin',
        'ky' => 'kir',
        'kv' => 'kom',
        'kg' => 'kon',
        'ko' => 'kor',
        'kj' => 'kua',
        'ku' => 'kur',
        'lo' => 'lao',
        'la' => 'lat',
        'lv' => 'lav',
        'li' => 'lim',
        'ln' => 'lin',
        'lt' => 'lit',
        'lb' => 'ltz',
        'lu' => 'lub',
        'lg' => 'lug',
        'mh' => 'mah',
        'ml' => 'mal',
        'mr' => 'mar',
        'mk' => 'mkd',
        'mg' => 'mlg',
        'mt' => 'mlt',
        'mn' => 'mon',
        'mi' => 'mri',
        'ms' => 'msa',
        'my' => 'mya',
        'na' => 'nau',
        'nv' => 'nav',
        'nr' => 'nbl',
        'nd' => 'nde',
        'ng' => 'ndo',
        'ne' => 'nep',
        'nl' => 'nld',
        'nn' => 'nno',
        'nb' => 'nob',
        'ny' => 'nya',
        'oc' => 'oci',
        'oj' => 'oji',
        'or' => 'ori',
        'om' => 'orm',
        'os' => 'oss',
        'pa' => 'pan',
        'pi' => 'pli',
        'pl' => 'pol',
        'pt' => 'por',
        'ps' => 'pus',
        'qu' => 'que',
        'rm' => 'roh',
        'ro' => 'ron',
        'rn' => 'run',
        'ru' => 'rus',
        'sg' => 'sag',
        'sa' => 'san',
        'si' => 'sin',
        'sk' => 'slk',
        'sl' => 'slv',
        'se' => 'sme',
        'sm' => 'smo',
        'sn' => 'sna',
        'sd' => 'snd',
        'so' => 'som',
        'st' => 'sot',
        'es' => 'spa',
        'sq' => 'sqi',
        'sc' => 'srd',
        'sr' => 'srp',
        'ss' => 'ssw',
        'su' => 'sun',
        'sw' => 'swa',
        'sv' => 'swe',
        'ty' => 'tah',
        'ta' => 'tam',
        'tt' => 'tat',
        'te' => 'tel',
        'tg' => 'tgk',
        'th' => 'tha',
        'ti' => 'tir',
        'to' => 'ton',
        'tn' => 'tsn',
        'ts' => 'tso',
        'tk' => 'tuk',
        'tr' => 'tur',
        'ug' => 'uig',
        'uk' => 'ukr',
        'ur' => 'urd',
        'uz' => 'uzb',
        've' => 'ven',
        'vi' => 'vie',
        'vo' => 'vol',
        'wa' => 'wln',
        'wo' => 'wol',
        'xh' => 'xho',
        'yi' => 'yid',
        'yo' => 'yor',
        'za' => 'zha',
        'zh' => 'zho',
        'zu' => 'zul',
    ];

    /**
     * @var LanguageDataProvider
     */
    protected $dataProvider;
    private $defaultLocale;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dataProvider = new LanguageDataProvider(
            $this->getDataDirectory().'/'.Intl::LANGUAGE_DIR,
            $this->createEntryReader()
        );

        $this->defaultLocale = \Locale::getDefault();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        \Locale::setDefault($this->defaultLocale);
    }

    abstract protected function getDataDirectory();

    public function testGetLanguages()
    {
        $this->assertEquals(static::$languages, $this->dataProvider->getLanguages());
    }

    /**
     * @dataProvider provideLocales
     */
    public function testGetNames($displayLocale)
    {
        $languages = array_keys($this->dataProvider->getNames($displayLocale));

        sort($languages);

        $this->assertNotEmpty($languages);
        $this->assertEmpty(array_diff($languages, static::$languages));
    }

    public function testGetNamesDefaultLocale()
    {
        \Locale::setDefault('de_AT');

        $this->assertSame(
            $this->dataProvider->getNames('de_AT'),
            $this->dataProvider->getNames()
        );
    }

    /**
     * @dataProvider provideLocaleAliases
     */
    public function testGetNamesSupportsAliases($alias, $ofLocale)
    {
        // Can't use assertSame(), because some aliases contain scripts with
        // different collation (=order of output) than their aliased locale
        // e.g. sr_Latn_ME => sr_ME
        $this->assertEquals(
            $this->dataProvider->getNames($ofLocale),
            $this->dataProvider->getNames($alias)
        );
    }

    /**
     * @dataProvider provideLocales
     */
    public function testGetName($displayLocale)
    {
        $names = $this->dataProvider->getNames($displayLocale);

        foreach ($names as $language => $name) {
            $this->assertSame($name, $this->dataProvider->getName($language, $displayLocale));
        }
    }

    public function testGetNameDefaultLocale()
    {
        \Locale::setDefault('de_AT');

        $names = $this->dataProvider->getNames('de_AT');

        foreach ($names as $language => $name) {
            $this->assertSame($name, $this->dataProvider->getName($language));
        }
    }

    public function provideLanguagesWithAlpha3Equivalent()
    {
        return array_map(
            function ($value) { return [$value]; },
            array_keys(static::$alpha2ToAlpha3)
        );
    }

    /**
     * @dataProvider provideLanguagesWithAlpha3Equivalent
     */
    public function testGetAlpha3Code($language)
    {
        $this->assertSame(static::$alpha2ToAlpha3[$language], $this->dataProvider->getAlpha3Code($language));
    }

    public function provideLanguagesWithoutAlpha3Equivalent()
    {
        return array_map(
            function ($value) { return [$value]; },
            array_diff(static::$languages, array_keys(static::$alpha2ToAlpha3))
        );
    }

    /**
     * @dataProvider provideLanguagesWithoutAlpha3Equivalent
     */
    public function testGetAlpha3CodeFailsIfNoAlpha3Equivalent($currency)
    {
        $this->expectException('Symfony\Component\Intl\Exception\MissingResourceException');
        $this->dataProvider->getAlpha3Code($currency);
    }
}
