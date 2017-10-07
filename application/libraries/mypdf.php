<?php
# include TCPDF
require(APPPATH.'config/tcpdf'.EXT);
require_once($tcpdf['base_directory'].'/tcpdf.php');
class Mypdf extends TCPDF{
    
    private $formats = array(
		'A0' => array( 2383.937, 3370.394),
		'A1' => array( 1683.780, 2383.937),
		'A2' => array( 1190.551, 1683.780),
		'A3' => array(  841.890, 1190.551),
		'A4' => array(  595.276,  841.890),
		'A5' => array(  419.528,  595.276),
		'A6' => array(  297.638,  419.528),
		'A7' => array(  209.764,  297.638),
		'A8' => array(  147.402,  209.764),
		'A9' => array(  104.882,  147.402),
		'A10'=> array(   73.701,  104.882),
		'A11'=> array(   51.024,   73.701),
		'A12'=> array(   36.850,   51.024),
		// ISO 216 B Series + 2 SIS 014711 extensions
		'B0' => array( 2834.646, 4008.189),
		'B1' => array( 2004.094, 2834.646),
		'B2' => array( 1417.323, 2004.094),
		'B3' => array( 1000.630, 1417.323),
		'B4' => array(  708.661, 1000.630),
		'B5' => array(  498.898,  708.661),
		'B6' => array(  354.331,  498.898),
		'B7' => array(  249.449,  354.331),
		'B8' => array(  175.748,  249.449),
		'B9' => array(  124.724,  175.748),
		'B10'=> array(   87.874,  124.724),
		'B11'=> array(   62.362,   87.874),
		'B12'=> array(   42.520,   62.362),
		// ISO 216 C Series + 2 SIS 014711 extensions + 2 EXTENSION
		'C0' => array( 2599.370, 3676.535),
		'C1' => array( 1836.850, 2599.370),
		'C2' => array( 1298.268, 1836.850),
		'C3' => array(  918.425, 1298.268),
		'C4' => array(  649.134,  918.425),
		'C5' => array(  459.213,  649.134),
		'C6' => array(  323.150,  459.213),
		'C7' => array(  229.606,  323.150),
		'C8' => array(  161.575,  229.606),
		'C9' => array(  113.386,  161.575),
		'C10'=> array(   79.370,  113.386),
		'C11'=> array(   56.693,   79.370),
		'C12'=> array(   39.685,   56.693),
		'C76'=> array(  229.606,  459.213),
		'DL' => array(  311.811,  623.622),
		// SIS 014711 E Series
		'E0' => array( 2491.654, 3517.795),
		'E1' => array( 1757.480, 2491.654),
		'E2' => array( 1247.244, 1757.480),
		'E3' => array(  878.740, 1247.244),
		'E4' => array(  623.622,  878.740),
		'E5' => array(  439.370,  623.622),
		'E6' => array(  311.811,  439.370),
		'E7' => array(  221.102,  311.811),
		'E8' => array(  155.906,  221.102),
		'E9' => array(  110.551,  155.906),
		'E10'=> array(   76.535,  110.551),
		'E11'=> array(   53.858,   76.535),
		'E12'=> array(   36.850,   53.858),
		// SIS 014711 G Series
		'G0' => array( 2715.591, 3838.110),
		'G1' => array( 1919.055, 2715.591),
		'G2' => array( 1357.795, 1919.055),
		'G3' => array(  958.110, 1357.795),
		'G4' => array(  677.480,  958.110),
		'G5' => array(  479.055,  677.480),
		'G6' => array(  337.323,  479.055),
		'G7' => array(  238.110,  337.323),
		'G8' => array(  167.244,  238.110),
		'G9' => array(  119.055,  167.244),
		'G10'=> array(   82.205,  119.055),
		'G11'=> array(   59.528,   82.205),
		'G12'=> array(   39.685,   59.528),
		// ISO Press
		'RA0'=> array( 2437.795, 3458.268),
		'RA1'=> array( 1729.134, 2437.795),
		'RA2'=> array( 1218.898, 1729.134),
		'RA3'=> array(  864.567, 1218.898),
		'RA4'=> array(  609.449,  864.567),
		'SRA0'=> array( 2551.181, 3628.346),
		'SRA1'=> array( 1814.173, 2551.181),
		'SRA2'=> array( 1275.591, 1814.173),
		'SRA3'=> array(  907.087, 1275.591),
		'SRA4'=> array(  637.795,  907.087),
		// German  DIN 476
		'4A0'=> array( 4767.874, 6740.787),
		'2A0'=> array( 3370.394, 4767.874),
		// Variations on the ISO Standard
		'A2_EXTRA'   => array( 1261.417, 1754.646),
		'A3+'        => array(  932.598, 1369.134),
		'A3_EXTRA'   => array(  912.756, 1261.417),
		'A3_SUPER'   => array(  864.567, 1440.000),
		'SUPER_A3'   => array(  864.567, 1380.472),
		'A4_EXTRA'   => array(  666.142,  912.756),
		'A4_SUPER'   => array(  649.134,  912.756),
		'SUPER_A4'   => array(  643.465, 1009.134),
		'A4_LONG'    => array(  595.276,  986.457),
		'F4'         => array(  595.276,  935.433),
		'SO_B5_EXTRA'=> array(  572.598,  782.362),
		'A5_EXTRA'   => array(  490.394,  666.142),
		// ANSI Series
		'ANSI_E'=> array( 2448.000, 3168.000),
		'ANSI_D'=> array( 1584.000, 2448.000),
		'ANSI_C'=> array( 1224.000, 1584.000),
		'ANSI_B'=> array(  792.000, 1224.000),
		'ANSI_A'=> array(  612.000,  792.000),
		// Traditional 'Loose' North American Paper Sizes
		'USLEDGER'=> array( 1224.000,  792.000),
		'LEDGER' => array( 1224.000,  792.000),
		'ORGANIZERK'=> array(  792.000, 1224.000),
		'BIBLE'=> array(  792.000, 1224.000),
		'USTABLOID'=> array(  792.000, 1224.000),
		'TABLOID'=> array(  792.000, 1224.000),
		'ORGANIZERM'=> array(  612.000,  792.000),
		'USLETTER'=> array(  612.000,  792.000),
		'LETTER' => array(  612.000,  792.000),
		'USLEGAL'=> array(  612.000, 1008.000), 
		'LEGAL'  => array(  612.000, 1008.000),
		'GOVERNMENTLETTER'=> array(  576.000,  756.000),
		'GLETTER'=> array(  576.000,  756.000),
		'JUNIORLEGAL'=> array(  576.000,  360.000),
		'JLEGAL' => array(  576.000,  360.000),
		// Other North American Paper Sizes
		'QUADDEMY'=> array( 2520.000, 3240.000),
		'SUPER_B'=> array(  936.000, 1368.000),
		'QUARTO'=> array(  648.000,  792.000),
		'GOVERNMENTLEGAL'=> array(  612.000,  936.000), 
		'FOLIO'=> array(  612.000,  936.000),
		'MONARCH'=> array(  522.000,  756.000), 
		'EXECUTIVE'=> array(  522.000,  756.000),
		'ORGANIZERL'=> array(  522.000,  756.000), 
		'STATEMENT'=>  array(  522.000,  756.000),
		'MEMO'=> array(  396.000,  612.000),
		'FOOLSCAP'=> array(  595.440,  936.000),
		'COMPACT'=> array(  306.000,  486.000),
		'ORGANIZERJ'=> array(  198.000,  360.000),
		// Canadian standard CAN 2-9.60M
		'P1'=> array( 1587.402, 2437.795),
		'P2'=> array( 1218.898, 1587.402),
		'P3'=> array(  793.701, 1218.898),
		'P4'=> array(  609.449,  793.701),
		'P5'=> array(  396.850,  609.449),
		'P6'=> array(  303.307,  396.850),
		// North American Architectural Sizes
		'ARCH_E' => array( 2592.000, 3456.000),
		'ARCH_E1'=> array( 2160.000, 3024.000),
		'ARCH_D' => array( 1728.000, 2592.000),
		'BROADSHEET'=> array( 1296.000, 1728.000),
		'ARCH_C' => array( 1296.000, 1728.000),
		'ARCH_B' => array(  864.000, 1296.000),
		'ARCH_A' => array(  648.000,  864.000),
		// --- North American Envelope Sizes ---
		//   - Announcement Envelopes
		'ANNENV_A2'  => array(  314.640,  414.000),
		'ANNENV_A6'  => array(  342.000,  468.000),
		'ANNENV_A7'  => array(  378.000,  522.000),
		'ANNENV_A8'  => array(  396.000,  584.640),
		'ANNENV_A10' => array(  450.000,  692.640),
		'ANNENV_SLIM'=> array(  278.640,  638.640),
		//   - Commercial Envelopes
		'COMMENV_N6_1/4'=> array(  252.000,  432.000),
		'COMMENV_N6_3/4'=> array(  260.640,  468.000),
		'COMMENV_N8'    => array(  278.640,  540.000),
		'COMMENV_N9'    => array(  278.640,  638.640),
		'COMMENV_N10'   => array(  296.640,  684.000),
		'COMMENV_N11'   => array(  324.000,  746.640),
		'COMMENV_N12'   => array(  342.000,  792.000),
		'COMMENV_N14'   => array(  360.000,  828.000),
		//   - Catalogue Envelopes
		'CATENV_N1'     => array(  432.000,  648.000),
		'CATENV_N1_3/4' => array(  468.000,  684.000),
		'CATENV_N2'     => array(  468.000,  720.000),
		'CATENV_N3'     => array(  504.000,  720.000),
		'CATENV_N6'     => array(  540.000,  756.000),
		'CATENV_N7'     => array(  576.000,  792.000),
		'CATENV_N8'     => array(  594.000,  810.000),
		'CATENV_N9_1/2' => array(  612.000,  756.000),
		'CATENV_N9_3/4' => array(  630.000,  810.000),
		'CATENV_N10_1/2'=> array(  648.000,  864.000),
		'CATENV_N12_1/2'=> array(  684.000,  900.000),
		'CATENV_N13_1/2'=> array(  720.000,  936.000),
		'CATENV_N14_1/4'=> array(  810.000,  882.000),
		'CATENV_N14_1/2'=> array(  828.000, 1044.000),
		// Japanese (JIS P 0138-61) Standard B-Series
		'JIS_B0' => array( 2919.685, 4127.244),
		'JIS_B1' => array( 2063.622, 2919.685),
		'JIS_B2' => array( 1459.843, 2063.622),
		'JIS_B3' => array( 1031.811, 1459.843),
		'JIS_B4' => array(  728.504, 1031.811),
		'JIS_B5' => array(  515.906,  728.504),
		'JIS_B6' => array(  362.835,  515.906),
		'JIS_B7' => array(  257.953,  362.835),
		'JIS_B8' => array(  181.417,  257.953),
		'JIS_B9' => array(  127.559,  181.417),
		'JIS_B10'=> array(   90.709,  127.559),
		'JIS_B11'=> array(   62.362,   90.709),
		'JIS_B12'=> array(   45.354,   62.362),
		// PA Series
		'PA0' => array( 2381.102, 3174.803,),
		'PA1' => array( 1587.402, 2381.102),
		'PA2' => array( 1190.551, 1587.402),
		'PA3' => array(  793.701, 1190.551),
		'PA4' => array(  595.276,  793.701),
		'PA5' => array(  396.850,  595.276),
		'PA6' => array(  297.638,  396.850),
		'PA7' => array(  198.425,  297.638),
		'PA8' => array(  147.402,  198.425),
		'PA9' => array(   99.213,  147.402),
		'PA10'=> array(   73.701,   99.213),
		// Standard Photographic Print Sizes
		'PASSPORT_PHOTO'=> array(   99.213,  127.559),
		'E'   => array(  233.858,  340.157),
		'L'=> array(  252.283,  360.000),
		'3R'  => array(  252.283,  360.000),
		'KG'=> array(  289.134,  430.866),
		'4R'  => array(  289.134,  430.866),
		'4D'  => array(  340.157,  430.866),
		'2L'=> array(  360.000,  504.567),
		'5R'  => array(  360.000,  504.567),
		'8P'=> array(  430.866,  575.433),
		'6R'  => array(  430.866,  575.433),
		'6P'=> array(  575.433,  720.000),
		'8R'  => array(  575.433,  720.000),
		'6PW'=> array(  575.433,  864.567),
		'S8R' => array(  575.433,  864.567),
		'4P'=> array(  720.000,  864.567),
		'10R' => array(  720.000,  864.567),
		'4PW'=> array(  720.000, 1080.000),
		'S10R'=> array(  720.000, 1080.000),
		'11R' => array(  790.866, 1009.134),
		'S11R'=> array(  790.866, 1224.567),
		'12R' => array(  864.567, 1080.000),
		'S12R'=> array(  864.567, 1292.598),
		// Common Newspaper Sizes
		'NEWSPAPER_BROADSHEET'=> array( 2125.984, 1700.787),
		'NEWSPAPER_BERLINER'  => array( 1332.283,  892.913),
		'NEWSPAPER_TABLOID'=> array( 1218.898,  793.701),
		'NEWSPAPER_COMPACT'   => array( 1218.898,  793.701),
		// Business Cards
		'CREDIT_CARD'=> array(  153.014,  242.646),
		'BUSINESS_CARD'=> array(  153.014,  242.646),
		'BUSINESS_CARD_ISO7810'=> array(  153.014,  242.646),
		'BUSINESS_CARD_ISO216' => array(  147.402,  209.764),
		'BUSINESS_CARD_IT'=> array(  155.906,  240.945),
		'BUSINESS_CARD_UK'=> array(  155.906,  240.945),
		'BUSINESS_CARD_FR'=> array(  155.906,  240.945),
		'BUSINESS_CARD_DE'=> array(  155.906,  240.945),
		'BUSINESS_CARD_ES'=> array(  155.906,  240.945),
		'BUSINESS_CARD_CA'=> array(  144.567,  252.283),
		'BUSINESS_CARD_US'     => array(  144.567,  252.283),
		'BUSINESS_CARD_JP'     => array(  155.906,  257.953),
		'BUSINESS_CARD_HK'     => array(  153.071,  255.118),
		'BUSINESS_CARD_AU'=> array(  155.906,  255.118),
		'BUSINESS_CARD_DK'=> array(  155.906,  255.118),
		'BUSINESS_CARD_SE'     => array(  155.906,  255.118),
		'BUSINESS_CARD_RU'=> array(  141.732,  255.118),
		'BUSINESS_CARD_CZ'=> array(  141.732,  255.118),
		'BUSINESS_CARD_FI'=> array(  141.732,  255.118),
		'BUSINESS_CARD_HU'=> array(  141.732,  255.118),
		'BUSINESS_CARD_IL'     => array(  141.732,  255.118),
		// Billboards
		'4SHEET' => array( 2880.000, 4320.000),
		'6SHEET' => array( 3401.575, 5102.362),
		'12SHEET'=> array( 8640.000, 4320.000),
		'16SHEET'=> array( 5760.000, 8640.000),
		'32SHEET'=> array(11520.000, 8640.000),
		'48SHEET'=> array(17280.000, 8640.000),
		'64SHEET'=> array(23040.000, 8640.000),
		'96SHEET'=> array(34560.000, 8640.000),
		// Old European Sizes
		//   - Old Imperial English Sizes
		'EN_EMPEROR'          => array( 3456.000, 5184.000),
		'EN_ANTIQUARIAN'      => array( 2232.000, 3816.000),
		'EN_GRAND_EAGLE'      => array( 2070.000, 3024.000),
		'EN_DOUBLE_ELEPHANT'  => array( 1926.000, 2880.000),
		'EN_ATLAS'            => array( 1872.000, 2448.000),
		'EN_COLOMBIER'        => array( 1692.000, 2484.000),
		'EN_ELEPHANT'         => array( 1656.000, 2016.000),
		'EN_DOUBLE_DEMY'      => array( 1620.000, 2556.000),
		'EN_IMPERIAL'         => array( 1584.000, 2160.000),
		'EN_PRINCESS'         => array( 1548.000, 2016.000),
		'EN_CARTRIDGE'        => array( 1512.000, 1872.000),
		'EN_DOUBLE_LARGE_POST'=> array( 1512.000, 2376.000),
		'EN_ROYAL'            => array( 1440.000, 1800.000),
		'EN_SHEET'			  => array( 1404.000, 1692.000),
		'EN_HALF_POST'        => array( 1404.000, 1692.000),
		'EN_SUPER_ROYAL'      => array( 1368.000, 1944.000),
		'EN_DOUBLE_POST'      => array( 1368.000, 2196.000),
		'EN_MEDIUM'           => array( 1260.000, 1656.000),
		'EN_DEMY'             => array( 1260.000, 1620.000),
		'EN_LARGE_POST'       => array( 1188.000, 1512.000),
		'EN_COPY_DRAUGHT'     => array( 1152.000, 1440.000),
		'EN_POST'             => array( 1116.000, 1386.000),
		'EN_CROWN'            => array( 1080.000, 1440.000),
		'EN_PINCHED_POST'     => array( 1062.000, 1332.000),
		'EN_BRIEF'            => array(  972.000, 1152.000),
		'EN_FOOLSCAP'         => array(  972.000, 1224.000),
		'EN_SMALL_FOOLSCAP'   => array(  954.000, 1188.000),
		'EN_POTT'             => array(  900.000, 1080.000),
		//   - Old Imperial Belgian Sizes
		'BE_GRAND_AIGLE' => array( 1984.252, 2948.031),
		'BE_COLOMBIER'   => array( 1757.480, 2409.449),
		'BE_DOUBLE_CARRE'=> array( 1757.480, 2607.874),
		'BE_ELEPHANT'    => array( 1746.142, 2182.677),
		'BE_PETIT_AIGLE' => array( 1700.787, 2381.102),
		'BE_GRAND_JESUS' => array( 1559.055, 2069.291),
		'BE_JESUS'       => array( 1530.709, 2069.291),
		'BE_RAISIN'      => array( 1417.323, 1842.520),
		'BE_GRAND_MEDIAN'=> array( 1303.937, 1714.961),
		'BE_DOUBLE_POSTE'=> array( 1233.071, 1601.575),
		'BE_COQUILLE'    => array( 1218.898, 1587.402),
		'BE_PETIT_MEDIAN'=> array( 1176.378, 1502.362),
		'BE_RUCHE'       => array( 1020.472, 1303.937),
		'BE_PROPATRIA'   => array(  977.953, 1218.898),
		'BE_LYS'         => array(  898.583, 1125.354),
		'BE_POT'         => array(  870.236, 1088.504),
		'BE_ROSETTE'     => array(  765.354,  983.622),
		//   - Old Imperial French Sizes
		'FR_UNIVERS'          => array( 2834.646, 3685.039),
		'FR_DOUBLE_COLOMBIER' => array( 2551.181, 3571.654),
		'FR_GRANDE_MONDE'     => array( 2551.181, 3571.654),
		'FR_DOUBLE_SOLEIL'    => array( 2267.717, 3401.575),
		'FR_DOUBLE_JESUS'     => array( 2154.331, 3174.803),
		'FR_GRAND_AIGLE'      => array( 2125.984, 3004.724),
		'FR_PETIT_AIGLE'      => array( 1984.252, 2664.567),
		'FR_DOUBLE_RAISIN'    => array( 1842.520, 2834.646),
		'FR_JOURNAL'          => array( 1842.520, 2664.567),
		'FR_COLOMBIER_AFFICHE'=> array( 1785.827, 2551.181),
		'FR_DOUBLE_CAVALIER'  => array( 1757.480, 2607.874),
		'FR_CLOCHE'           => array( 1700.787, 2267.717),
		'FR_SOLEIL'           => array( 1700.787, 2267.717),
		'FR_DOUBLE_CARRE'     => array( 1587.402, 2551.181),
		'FR_DOUBLE_COQUILLE'  => array( 1587.402, 2494.488),
		'FR_JESUS'            => array( 1587.402, 2154.331),
		'FR_RAISIN'           => array( 1417.323, 1842.520),
		'FR_CAVALIER'         => array( 1303.937, 1757.480),
		'FR_DOUBLE_COURONNE'  => array( 1303.937, 2040.945),
		'FR_CARRE'            => array( 1275.591, 1587.402),
		'FR_COQUILLE'         => array( 1247.244, 1587.402),
		'FR_DOUBLE_TELLIERE'  => array( 1247.244, 1927.559),
		'FR_DOUBLE_CLOCHE'    => array( 1133.858, 1700.787),
		'FR_DOUBLE_POT'       => array( 1133.858, 1757.480),
		'FR_ECU'              => array( 1133.858, 1474.016),
		'FR_COURONNE'         => array( 1020.472, 1303.937),
		'FR_TELLIERE'         => array(  963.780, 1247.244),
		'FR_POT'              => array(  878.740, 1133.858),		
	);
    
    /*
	Add a custom format
	@param $width Width in mm
	@param $height Height in mm	
	*/
	public function addFormat($name, $width, $height){ 
		// Paper cordinates are calculated in this way: (inches * 72) where (1 inch = 25.4 mm)
		$widthInInches = round($width/25.4, 3);
		$heightInInches = round($height/25.4, 3);
		$f = array($widthInInches*72, $heightInInches*72);
		$this->formats[$name] = $f;		
	}
	
	public function getPageSizeFromFormat($format) {
		// Paper cordinates are calculated in this way: (inches * 72) where (1 inch = 25.4 mm)
		if(array_key_exists($format, $this->formats))
			$pf = $this->formats[$format];
		else
			$pf = array(595.276,  841.890);  // DEFAULT ISO A4
		return $pf;
	}
	
	public function reFormat($format, $orientation='P'){
		parent::setPageFormat($format, $orientation);
	}
    
    
    //Page header
    public function Header() {
        
        // Logo
        //$image_file = K_PATH_IMAGES.'logo_example.jpg';
        //$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        //$this->SetFont('helvetica', 'B', 12);
        // Title
        //$this->Cell(0, 0, 'INFORMASI JASA TAGIHAN TELEKOMUNIKASI', 1, 1, 'R', 0, '', 0, false, 'T', 'M');
        //$this->Ln();
        //$this->SetFont('helvetica', 'B', 8);
        //$this->Cell(0, 0, date('d M, Y'), 1, 1, 'R', 0, '', 0, false, 'T', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        //$this->SetY(-15);
        // Set font
        //$this->SetFont('helvetica', 'I', 8);
        // Page number
        //$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    
    
            
    
}

?>