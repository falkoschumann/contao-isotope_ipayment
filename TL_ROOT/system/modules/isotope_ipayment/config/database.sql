-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_iso_payment_modules`
-- 

CREATE TABLE `tl_iso_payment_modules` (
  `ipayment_account_id` int(10) NOT NULL default '99999',
  `ipayment_trxuser_id` int(10) NOT NULL default '99999',
  `ipayment_trxpassword` int(10) NOT NULL default '0',
  `ipayment_security_key` varchar(32) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
