-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2015 at 12:17 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account_groups`
--

CREATE TABLE IF NOT EXISTS `tb_account_groups` (
  `id` int(11) NOT NULL,
  `account_type` varchar(225) NOT NULL,
  `account_groupname` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_account_groups`
--

INSERT INTO `tb_account_groups` (`id`, `account_type`, `account_groupname`) VALUES
(11, 'Assets', 'Cash in Bank - Current Account'),
(12, 'Assets', 'Cash in Bank - Dollar Account'),
(13, 'Assets', 'Prepaid Expenses'),
(14, 'Assets', 'Accounts Receivable'),
(15, 'Assets', 'Advances of Employees'),
(16, 'Assets', 'Advances of Officers'),
(17, 'Assets', 'Security Deposit'),
(18, 'Assets', 'Prepaid Rent'),
(19, 'Liabilities', 'Accrued Salaries and Wages '),
(20, 'Liabilities', 'Accounts Payable - Trade'),
(21, 'Liabilities', 'Accounts Payble - Non Trade'),
(22, 'Liabilities', 'Accounts Payable - Others'),
(23, 'Liabilities', 'Employees Witholding Tax Payable '),
(24, 'Liabilities', 'Accrued EI'),
(25, 'Liabilities', 'Accrued Income Tax'),
(26, 'Capital', 'Paid In Capital'),
(27, 'Capital', 'Common Stock Class A'),
(28, 'Capital', 'Unrealized Foreign Exchange Gain (Loss)'),
(29, 'Capital', 'Tax Refunds'),
(30, 'Capital', 'Income Tax Paid'),
(31, 'Capital', 'Dividends Declared'),
(32, 'Capital', 'Net Income (Loss)'),
(33, 'Revenue', 'Service Revenue'),
(34, 'Revenue', 'Interest Income'),
(35, 'Expense', 'Rent Expenses'),
(36, 'Expense', 'Salaries and Wages Expense'),
(37, 'Expense', 'Travel Expenses'),
(38, 'Expense', 'Hotel and Accomodation Expenses'),
(39, 'Expense', 'Sales Expenses'),
(40, 'Expense', 'Association Dues Expenses'),
(41, 'Expense', 'Interest Expenses'),
(42, 'Expense', 'Light and Water Expenses'),
(43, 'Expense', 'Management Fee Expenses'),
(44, 'Expense', 'Training Allowances'),
(45, 'Expense', 'Gasoline and Oil Expenses'),
(46, 'Expense', 'Miscellaneous Expenses'),
(47, 'Expense', 'Representation Expenses'),
(48, 'Expense', 'SSS Employer Share'),
(49, 'Expense', 'Pag Ibig Employer Share'),
(50, 'Expense', 'Philhealth Employer Share'),
(51, 'Expense', 'Office Supplies Expenses'),
(52, 'Expense', 'Professional Fees Expenses '),
(53, 'Expense', 'Business Tax and Licenses'),
(55, 'Assets', 'Cash on hand'),
(56, 'Assets', 'Cash in Bank'),
(57, 'Assets', 'Cash and Cash Equivalent'),
(58, 'Liabilities', 'Saving Deposits'),
(59, 'Liabilities', 'Time Deposits'),
(60, 'Capital', 'Common Share Capital-Autorized');

-- --------------------------------------------------------

--
-- Table structure for table `tb_account_subsidiary`
--

CREATE TABLE IF NOT EXISTS `tb_account_subsidiary` (
  `sub_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `sub_date` varchar(255) NOT NULL,
  `account_code` int(11) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_account_subsidiary`
--

INSERT INTO `tb_account_subsidiary` (`sub_id`, `project_id`, `sub_date`, `account_code`, `account_title`, `account_type`, `sub_code`, `sub_name`) VALUES
(1, 2, '07/11/2015', 11130, 'Cash in Bank', 'Assets', '11130-11111-11111-11111', 'BDO - CURRENT ACCOUNT - 2868005848 '),
(2, 2, '07/11/2015', 11130, 'Cash in Bank', 'Assets', '11130-11111-11112-11111', 'BDO - DOLLAR ILIGAN - 3120156870 '),
(3, 2, '07/11/2015', 11130, 'Cash in Bank', 'Assets', '11130-11112-11113-11111', 'BANK OF THE PHILIPPINES ISLAND-9821002505 '),
(4, 2, '07/22/2015', 20101, 'ACCOUNTS PAYABLE - TRADE', 'Liabilities', '20101-11111', 'AP TRADE'),
(5, 2, '07/22/2015', 20101, 'ACCOUNTS PAYABLE - TRADE', 'Liabilities', '20101-11111-11111', 'AP TRADE - BDO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_account_title`
--

CREATE TABLE IF NOT EXISTS `tb_account_title` (
  `account_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `account_date` varchar(255) NOT NULL,
  `account_code` varchar(255) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `account_group` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_account_title`
--

INSERT INTO `tb_account_title` (`account_id`, `project_id`, `account_date`, `account_code`, `account_title`, `account_type`, `account_group`) VALUES
(6, 2, '07/01/2015', '11120', 'Checks and Other Cash Items (COCI)', 'Assets', 'Cash and Cash Equivalent'),
(7, 2, '07/01/2015', '11130', 'Cash in Bank', 'Assets', 'Cash in Bank'),
(8, 2, '07/01/2015', '21100', 'Saving Deposits', 'Liabilities', 'Saving Deposits'),
(9, 2, '07/01/2015', '21200', 'Time Deposits', 'Liabilities', 'Time Deposits'),
(10, 2, '07/01/2015', '30110', 'Authorized Share Capital - Common', 'Capital', 'Common Share Capital-Autorized'),
(11, 2, '07/01/2015', '40110', 'Interest Income from Loans', 'Revenue', 'Interest Income'),
(12, 2, '07/01/2015', '40210', 'Service Income', 'Revenue', 'Service Revenue'),
(13, 2, '07/01/2015', '61210', 'Salaries  and Wages', 'Expense', 'Salaries and Wages Expense'),
(14, 2, '07/01/2015', '61240', 'SSS, Philhealth, Pag-Ibig Contribution', 'Expense', 'SSS Employer Share'),
(15, 2, '07/08/2015', '40100', 'Income from Credit Operations', 'Revenue', 'Service Revenue'),
(16, 2, '07/08/2015', '40120', 'Service Fees', 'Revenue', 'Service Revenue'),
(17, 2, '07/08/2015', '40130', 'Filing Fees', 'Revenue', 'Service Revenue'),
(18, 2, '07/08/2015', '11140', 'Cash in Cooperative Federation', 'Assets', 'Cash in Bank - Current Account'),
(19, 2, '07/08/2015', '40140', 'Fines,Penalties,Surcharges', 'Revenue', 'Service Revenue'),
(20, 2, '07/08/2015', '11150', 'Petty Cash Fund', 'Assets', 'Cash in Bank - Current Account'),
(21, 2, '07/08/2015', '11160', 'Revolving Fund', 'Assets', 'Cash in Bank - Current Account'),
(22, 2, '07/08/2015', '11170', 'Change Fund', 'Assets', 'Cash in Bank - Current Account'),
(23, 2, '07/08/2015', '11200', 'Investment at Fair Value through Profit or Loss', 'Assets', 'Cash in Bank - Current Account'),
(24, 2, '07/08/2015', '11300', 'Held-to-Maturity (HTM) Financial Assets', 'Assets', 'Cash in Bank - Current Account'),
(25, 2, '07/08/2015', '11310', 'Unamortized Discount/Premium - HTM', 'Assets', 'Cash in Bank - Current Account'),
(26, 2, '07/08/2015', '40200', 'Income from Service Operations', 'Revenue', 'Service Revenue'),
(27, 2, '07/08/2015', '11400', 'Available-for-Sale (AFS) Financial Assets', 'Assets', 'Cash in Bank - Current Account'),
(28, 2, '07/08/2015', '11410', 'Accumulated Gains/Losses - AFS', 'Assets', 'Cash in Bank - Current Account'),
(29, 2, '07/08/2015', '11420', 'Allowance for Probable Losses - AFS FA', 'Assets', 'Cash in Bank - Current Account'),
(30, 2, '07/08/2015', '40220', 'Interest Income from Lease Agreement', 'Revenue', 'Service Revenue'),
(31, 2, '07/08/2015', '40300', 'Income from Marketing/Consumers/Production Operations', 'Revenue', 'Service Revenue'),
(32, 2, '07/08/2015', '11500', 'Unquoted Debt Securities Classified As Loans', 'Assets', 'Cash in Bank - Current Account'),
(33, 2, '07/08/2015', '40305', 'Net Sales', 'Revenue', 'Service Revenue'),
(34, 2, '07/08/2015', '40310', 'Sales', 'Revenue', 'Service Revenue'),
(35, 2, '07/08/2015', '11600', 'Investment in Non-Marketable Equity Securities (INMES)', 'Assets', 'Cash in Bank - Current Account'),
(36, 2, '07/08/2015', '11610', 'Allowance for Probable Losses - INMES', 'Assets', 'Cash in Bank - Current Account'),
(37, 2, '07/08/2015', '11700', 'Loans and Receivables', 'Assets', 'Cash in Bank - Current Account'),
(38, 2, '07/08/2015', '40320', 'Installment Sales', 'Revenue', 'Service Revenue'),
(39, 2, '07/08/2015', '11711', 'Loans Receivable - Current', 'Assets', 'Cash in Bank - Current Account'),
(40, 2, '07/08/2015', '40330', 'Sales Returns & Allowances', 'Revenue', 'Service Revenue'),
(41, 2, '07/08/2015', '40340', 'Sales Discounts', 'Revenue', 'Service Revenue'),
(42, 2, '07/08/2015', '11712', 'Loans Receivable - Past Due', 'Assets', 'Cash in Bank - Current Account'),
(43, 2, '07/08/2015', '40400', 'Other Income', 'Revenue', 'Service Revenue'),
(44, 2, '07/08/2015', '11713', 'Loans Receivable Restructured', 'Assets', 'Cash in Bank - Current Account'),
(45, 2, '07/08/2015', '40410', 'Income/Interest from Investment/Deposits', 'Revenue', 'Service Revenue'),
(46, 2, '07/08/2015', '11714', 'Loans Receivable - Loans in Litigation', 'Assets', 'Cash in Bank - Current Account'),
(47, 2, '07/08/2015', '40420', 'Membership Fee', 'Revenue', 'Service Revenue'),
(48, 2, '07/08/2015', '11715', 'Unearned Interests and Discounts', 'Assets', 'Cash in Bank - Current Account'),
(49, 2, '07/08/2015', '40430', 'Commission Income', 'Revenue', 'Service Revenue'),
(50, 2, '07/08/2015', '40440', 'Realized Gross Margin', 'Revenue', 'Service Revenue'),
(51, 2, '07/08/2015', '11716', 'Allowance for Probable Losses on Loans', 'Assets', 'Cash in Bank - Current Account'),
(52, 2, '07/08/2015', '40450', 'Miscellaneous Income', 'Revenue', 'Service Revenue'),
(53, 2, '07/08/2015', '11721', 'Accounts Receivables Trade - Current', 'Assets', 'Cash in Bank - Current Account'),
(54, 2, '07/08/2015', '50000', 'Cost of Goods Sold', 'Revenue', 'Service Revenue'),
(55, 2, '07/08/2015', '11722', 'Accounts Receivables Trade - Past Due', 'Assets', 'Cash in Bank - Current Account'),
(56, 2, '07/08/2015', '51000', 'Cost of Goods Sold', 'Revenue', 'Service Revenue'),
(57, 2, '07/08/2015', '51110', 'Purchases', 'Revenue', 'Service Revenue'),
(58, 2, '07/08/2015', '11723', 'Accounts Receivables Trade - Restructured', 'Assets', 'Cash in Bank - Current Account'),
(59, 2, '07/08/2015', '51120', 'Raw Materials Purchases', 'Revenue', 'Service Revenue'),
(60, 2, '07/08/2015', '11724', 'Accounts Receivables Trade - in Litigation', 'Assets', 'Cash in Bank - Current Account'),
(61, 2, '07/08/2015', '51130', 'Purchase Returns & Allowances', 'Revenue', 'Service Revenue'),
(62, 2, '07/08/2015', '51140', 'Purchase Discounts', 'Revenue', 'Service Revenue'),
(63, 2, '07/08/2015', '11725', 'Allowance for Probable Losses on Accounts Receivable Trade', 'Assets', 'Cash in Bank - Current Account'),
(64, 2, '07/08/2015', '51160', 'Freight In', 'Revenue', 'Service Revenue'),
(65, 2, '07/08/2015', '11730', 'Installment Receivables - Current', 'Assets', 'Cash in Bank - Current Account'),
(66, 2, '07/08/2015', '51170', 'Direct Labor', 'Revenue', 'Service Revenue'),
(67, 2, '07/08/2015', '11731', 'Installment Receivables - Past Due', 'Assets', 'Cash in Bank - Current Account'),
(68, 2, '07/08/2015', '51180', 'Factory/Processing Overhead', 'Revenue', 'Service Revenue'),
(69, 2, '07/08/2015', '51200', 'Inventory Loss', 'Revenue', 'Service Revenue'),
(70, 2, '07/08/2015', '11733', 'Installment Receivables - Restructured', 'Assets', 'Cash in Bank - Current Account'),
(71, 2, '07/08/2015', '60000', 'Cost of Services', 'Revenue', 'Service Revenue'),
(72, 2, '07/08/2015', '61000', 'Project Management Cost', 'Revenue', 'Service Revenue'),
(73, 2, '07/08/2015', '61110', 'Labor and Technical Supervision', 'Revenue', 'Service Revenue'),
(74, 2, '07/08/2015', '61230', 'Employees'' Benefits', 'Revenue', 'Service Revenue'),
(75, 2, '07/08/2015', '61250', 'Retirement Benefit Expenses', 'Revenue', 'Service Revenue'),
(76, 2, '07/08/2015', '61280', 'Professional and Consultancy Fees', 'Revenue', 'Service Revenue'),
(77, 2, '07/08/2015', '11734', 'Installment Receivables - in Litigation', 'Assets', 'Cash in Bank - Current Account'),
(78, 2, '07/08/2015', '61370', 'Supplies', 'Revenue', 'Service Revenue'),
(79, 2, '07/08/2015', '61410', 'Power,Light and Water', 'Revenue', 'Service Revenue'),
(80, 2, '07/08/2015', '61430', 'Insurance', 'Revenue', 'Service Revenue'),
(81, 2, '07/08/2015', '62280', 'Professional and Consultancy Fees', 'Revenue', 'Service Revenue'),
(82, 2, '07/08/2015', '62370', 'Supplies', 'Revenue', 'Service Revenue'),
(83, 2, '07/08/2015', '62410', 'Power,Light and Water', 'Revenue', 'Service Revenue'),
(84, 2, '07/08/2015', '62430', 'Insurance', 'Revenue', 'Service Revenue'),
(85, 2, '07/08/2015', '62440', 'Repairs and Maintenance', 'Revenue', 'Service Revenue'),
(86, 2, '07/08/2015', '62450', 'Rentals', 'Revenue', 'Service Revenue'),
(87, 2, '07/08/2015', '11735', 'Allowance for Probable Losses on Installment Receivables', 'Assets', 'Cash in Bank - Current Account'),
(88, 2, '07/08/2015', '62490', 'Gas, Oil & Lubricants', 'Revenue', 'Service Revenue'),
(89, 2, '07/08/2015', '62530', 'Depreciation', 'Revenue', 'Service Revenue'),
(90, 2, '07/08/2015', '62540', 'Amortization', 'Revenue', 'Service Revenue'),
(91, 2, '07/08/2015', '62590', 'Impairment Loss', 'Revenue', 'Service Revenue'),
(92, 2, '07/08/2015', '11736', 'Unrealized Gross Margin', 'Assets', 'Cash in Bank - Current Account'),
(93, 2, '07/08/2015', '11740', 'Sales Contract Receivable', 'Assets', 'Cash in Bank - Current Account'),
(94, 2, '07/08/2015', '63000', 'Distribution Cost', 'Revenue', 'Service Revenue'),
(95, 2, '07/08/2015', '11741', 'Allowance for Probable Losses - Sales Contract Receivables', 'Assets', 'Cash in Bank - Current Account'),
(96, 2, '07/08/2015', '63120', 'Power Cost', 'Revenue', 'Service Revenue'),
(97, 2, '07/08/2015', '63130', 'Labor and Technical Supervision', 'Revenue', 'Service Revenue'),
(98, 2, '07/08/2015', '11750', 'Advances to Officers, Employees and Members', 'Assets', 'Cash in Bank - Current Account'),
(99, 2, '07/08/2015', '63210', 'Salaries and Wages', 'Revenue', 'Service Revenue'),
(100, 2, '07/08/2015', '11760', 'Due from Accountable Officers and Employees', 'Assets', 'Cash in Bank - Current Account'),
(101, 2, '07/08/2015', '63230', 'Employees'' Benefits', 'Revenue', 'Service Revenue'),
(102, 2, '07/08/2015', '11770', 'Finance Lease Receivable', 'Assets', 'Cash in Bank - Current Account'),
(103, 2, '07/08/2015', '11780', 'Other Current Receivables', 'Assets', 'Cash in Bank - Current Account'),
(104, 2, '07/08/2015', '11800', 'Inventories', 'Assets', 'Cash in Bank - Current Account'),
(105, 2, '07/08/2015', '11810', 'Merchandise Inventory', 'Assets', 'Cash in Bank - Current Account'),
(106, 2, '07/08/2015', '63240', 'SSS, Phil health, ECC, Pag-Ibig Contribution', 'Revenue', 'Service Revenue'),
(107, 2, '07/08/2015', '11820', 'Repossessed Inventories', 'Assets', 'Cash in Bank - Current Account'),
(108, 2, '07/08/2015', '63250', 'Retirement Benefit Expense', 'Revenue', 'Service Revenue'),
(109, 2, '07/08/2015', '11830', 'Spare Parts/Materials & Other Goods Inventory', 'Assets', 'Cash in Bank - Current Account'),
(110, 2, '07/08/2015', '63280', 'Professional and Consultancy Fees', 'Revenue', 'Service Revenue'),
(111, 2, '07/08/2015', '11840', 'Raw Materials Inventory', 'Assets', 'Cash in Bank - Current Account'),
(112, 2, '07/08/2015', '63370', 'Supplies', 'Revenue', 'Service Revenue'),
(113, 2, '07/08/2015', '11850', 'Work in Process Inventory', 'Assets', 'Cash in Bank - Current Account'),
(114, 2, '07/08/2015', '63390', 'Training/Seminars', 'Revenue', 'Service Revenue'),
(115, 2, '07/08/2015', '11860', 'Finished Goods Inventory', 'Assets', 'Cash in Bank - Current Account'),
(116, 2, '07/08/2015', '63410', 'Power, Light and Water', 'Revenue', 'Service Revenue'),
(117, 2, '07/08/2015', '11870', 'Agricultural Produce', 'Assets', 'Cash in Bank - Current Account'),
(118, 2, '07/08/2015', '63420', 'Travel and Transportation', 'Revenue', 'Service Revenue'),
(119, 2, '07/08/2015', '11880', 'Equipment for Lease Inventory', 'Assets', 'Cash in Bank - Current Account'),
(120, 2, '07/08/2015', '11890', 'Allowance for Decline in Value of Inventory', 'Assets', 'Cash in Bank - Current Account'),
(121, 2, '07/08/2015', '63430', 'Insurance', 'Revenue', 'Service Revenue'),
(122, 2, '07/08/2015', '11900', 'Biological Assets', 'Assets', 'Cash in Bank - Current Account'),
(123, 2, '07/08/2015', '63440', 'Repairs and Maintenance', 'Revenue', 'Service Revenue'),
(124, 2, '07/08/2015', '12000', 'Other Current Assets', 'Assets', 'Cash in Bank - Current Account'),
(125, 2, '07/08/2015', '63450', 'Rentals', 'Revenue', 'Service Revenue'),
(126, 2, '07/08/2015', '12100', 'Input Tax', 'Assets', 'Cash in Bank - Current Account'),
(127, 2, '07/08/2015', '63470', 'Communication', 'Revenue', 'Service Revenue'),
(128, 2, '07/08/2015', '12200', 'Deposit to Suppliers', 'Assets', 'Cash in Bank - Current Account'),
(129, 2, '07/08/2015', '63490', 'Gas, Oil & Lubricants', 'Revenue', 'Service Revenue'),
(130, 2, '07/08/2015', '12300', 'Unused Supplies', 'Assets', 'Cash in Bank - Current Account'),
(131, 2, '07/08/2015', '63520', 'Miscellaneous', 'Revenue', 'Service Revenue'),
(132, 2, '07/08/2015', '12400', 'Prepaid Expenses', 'Assets', 'Cash in Bank - Current Account'),
(133, 2, '07/08/2015', '63530', 'Depreciation', 'Revenue', 'Service Revenue'),
(134, 2, '07/08/2015', '63540', 'Amortization', 'Revenue', 'Service Revenue'),
(135, 2, '07/08/2015', '63590', 'Impairment Loss', 'Revenue', 'Service Revenue'),
(136, 2, '07/08/2015', '13100', 'Held-to-Maturity (HTM) Financial Assets', 'Assets', 'Cash in Bank - Current Account'),
(137, 2, '07/08/2015', '64000', 'Transport Service Cost', 'Revenue', 'Service Revenue'),
(138, 2, '07/08/2015', '13110', 'Unamortized Discount/Premium - HTM', 'Assets', 'Cash in Bank - Current Account'),
(139, 2, '07/08/2015', '64140', 'Driver''s/Conductor''s Fees', 'Revenue', 'Service Revenue'),
(140, 2, '07/08/2015', '13120', 'Allowance for Probable Losses - HTM - LTFA', 'Assets', 'Cash in Bank - Current Account'),
(141, 2, '07/08/2015', '13200', 'Available-for-Sale (AFS) Financial Assets', 'Assets', 'Cash in Bank - Current Account'),
(142, 2, '07/08/2015', '13210', 'Accumulated Gains/Losses - AFS', 'Assets', 'Cash in Bank - Current Account'),
(143, 2, '07/08/2015', '64150', 'Vehicle Registration and Licensing Expenses', 'Revenue', 'Service Revenue'),
(144, 2, '07/08/2015', '64160', 'Toll Fees', 'Revenue', 'Service Revenue'),
(145, 2, '07/08/2015', '64170', 'Incidental Expenses', 'Revenue', 'Service Revenue'),
(146, 2, '07/08/2015', '64430', 'Insurance', 'Revenue', 'Service Revenue'),
(147, 2, '07/08/2015', '64440', 'Repairs and Maintenance', 'Revenue', 'Service Revenue'),
(148, 2, '07/08/2015', '64490', 'Gas, Oil & Lubricants', 'Revenue', 'Service Revenue'),
(149, 2, '07/08/2015', '64530', 'Depreciation', 'Revenue', 'Service Revenue'),
(150, 2, '07/08/2015', '64580', 'Provision for Fortuitous Events and Accidents', 'Revenue', 'Service Revenue'),
(151, 2, '07/08/2015', '71000', 'Financing Cost', 'Expense', 'Rent Expenses'),
(152, 2, '07/08/2015', '71100', 'Interest Expense on Borrowings', 'Expense', 'Rent Expenses'),
(153, 2, '07/08/2015', '71200', 'Interest Expense on Deposits', 'Expense', 'Rent Expenses'),
(154, 2, '07/08/2015', '71300', 'Other Financing Charges', 'Expense', 'Rent Expenses'),
(155, 2, '07/08/2015', '72000', 'Selling/Marketing Cost', 'Expense', 'Rent Expenses'),
(156, 2, '07/11/2015', '20101', 'ACCOUNTS PAYABLE - TRADE', 'Liabilities', 'Accounts Payable - Trade'),
(157, 2, '07/11/2015', '20102', 'ACCOUNTS PAYABLE - NON TRADE ', 'Liabilities', 'Accounts Payble - Non Trade');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank_recon`
--

CREATE TABLE IF NOT EXISTS `tb_bank_recon` (
  `bank_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_month` varchar(255) NOT NULL,
  `bank_year` varchar(255) NOT NULL,
  `bank_balance` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bank_recon`
--

INSERT INTO `tb_bank_recon` (`bank_id`, `project_id`, `bank_name`, `bank_month`, `bank_year`, `bank_balance`) VALUES
(1, 0, 'BANCO DE ORO', 'July', '2005', '12,000,000.00'),
(2, 0, 'BANCO DE ORO', 'July', '2005', '1,000,000.00'),
(3, 0, 'BANK OF THE PHILIPPINES', 'July', '2005', '250,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_copyrights`
--

CREATE TABLE IF NOT EXISTS `tb_copyrights` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `footer` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_copyrights`
--

INSERT INTO `tb_copyrights` (`id`, `company_name`, `year`, `footer`) VALUES
(4, 'EPSI (Excellent Performance Services Inc.)', '2015', 'Licensed software of PNI International Corporation. Reproduction in any format, digital or otherwise, for purposes of publication, display or distribution without written consent of the Developer is prohibited. PNI International Corporation © 2014. All rights reserved.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_ap`
--

CREATE TABLE IF NOT EXISTS `tb_journal_ap` (
  `ap_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `ap_invoice_no` varchar(255) NOT NULL,
  `ap_invoice_date` varchar(255) NOT NULL,
  `ap_po_no` varchar(255) NOT NULL,
  `ap_master_name` varchar(255) NOT NULL,
  `ap_invoice_amount` varchar(255) NOT NULL,
  `ap_particulars` varchar(255) NOT NULL,
  `ap_trans_id` varchar(255) NOT NULL,
  `total_debit` varchar(225) NOT NULL,
  `total_credit` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_journal_ap`
--

INSERT INTO `tb_journal_ap` (`ap_id`, `project_id`, `ap_invoice_no`, `ap_invoice_date`, `ap_po_no`, `ap_master_name`, `ap_invoice_amount`, `ap_particulars`, `ap_trans_id`, `total_debit`, `total_credit`) VALUES
(1, 2, '09', '08/01/2015', '90', ' AVASIA INFORMATIONS SYSTEMS', ' 30,000', 'To record employee salary and benefits', '', ' 30,000.00', ' 30,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_ap_trans`
--

CREATE TABLE IF NOT EXISTS `tb_journal_ap_trans` (
  `count` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `ap_id` int(11) NOT NULL,
  `ap_trans_account_code` varchar(255) NOT NULL,
  `ap_trans_sub_name` varchar(255) NOT NULL,
  `ap_trans_dr` varchar(255) NOT NULL,
  `ap_trans_cr` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_journal_ap_trans`
--

INSERT INTO `tb_journal_ap_trans` (`count`, `project_id`, `ap_id`, `ap_trans_account_code`, `ap_trans_sub_name`, `ap_trans_dr`, `ap_trans_cr`) VALUES
(1, 2, 1, '61240', ' SSS, Philhealth, Pag-Ibig Contribution ', '0', '10000'),
(2, 2, 1, '61210', ' Salaries  and Wages ', '0', '20000'),
(3, 2, 1, '001', 'ACCOUNTS PAYABLE -  AVASIA INFORMATIONS SYSTEMS ', '30000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_cd`
--

CREATE TABLE IF NOT EXISTS `tb_journal_cd` (
  `cd_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `cd_date` varchar(255) NOT NULL,
  `cd_voucher_no` varchar(255) NOT NULL,
  `cd_payee_name` varchar(255) NOT NULL,
  `cd_check_no` varchar(255) NOT NULL,
  `cd_master_name` varchar(255) NOT NULL,
  `cd_released` varchar(255) NOT NULL,
  `cd_released_date` varchar(255) NOT NULL,
  `cd_cleared` varchar(255) NOT NULL,
  `cd_cleared_date` varchar(255) NOT NULL,
  `cd_check_amount` varchar(255) NOT NULL,
  `cd_particulars` varchar(255) NOT NULL,
  `cd_trans_id` int(11) NOT NULL,
  `total_debit` varchar(255) NOT NULL,
  `total_credit` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_journal_cd`
--

INSERT INTO `tb_journal_cd` (`cd_id`, `project_id`, `cd_date`, `cd_voucher_no`, `cd_payee_name`, `cd_check_no`, `cd_master_name`, `cd_released`, `cd_released_date`, `cd_cleared`, `cd_cleared_date`, `cd_check_amount`, `cd_particulars`, `cd_trans_id`, `total_debit`, `total_credit`) VALUES
(1, 2, '08/01/2015', '10', 'Mr. Quintos', '10', 'BDO - DOLLAR ILIGAN - 3120156870', 'Yes', '08/01/2015', 'Yes', '08/01/2015', '20000', 'To record vehicle unit expenses', 0, ' 15,000.00', ' 15,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_cd_trans`
--

CREATE TABLE IF NOT EXISTS `tb_journal_cd_trans` (
  `cd_trans_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `cd_trans_account_code` varchar(255) NOT NULL,
  `cd_trans_sub_name` varchar(255) NOT NULL,
  `cd_trans_dr` varchar(255) NOT NULL,
  `cd_trans_cr` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_journal_cd_trans`
--

INSERT INTO `tb_journal_cd_trans` (`cd_trans_id`, `project_id`, `cd_id`, `cd_trans_account_code`, `cd_trans_sub_name`, `cd_trans_dr`, `cd_trans_cr`) VALUES
(1, 2, 1, '64150', 'Vehicle Registration and Licensing Expenses', '15000', '0'),
(2, 2, 1, '11130-11111-11112-11111', 'CASH IN BANK - BDO - DOLLAR ILIGAN - 3120156870 ', '0', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_cr`
--

CREATE TABLE IF NOT EXISTS `tb_journal_cr` (
  `cr_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `cr_or_no` varchar(255) NOT NULL,
  `cr_or_date` varchar(255) NOT NULL,
  `cr_master_name_customer` varchar(255) NOT NULL,
  `cr_sj_si_no` varchar(255) NOT NULL,
  `cr_master_name_bank` varchar(255) NOT NULL,
  `cr_cleared` varchar(255) NOT NULL,
  `cr_cleared_date` varchar(255) NOT NULL,
  `cr_or_amount` varchar(255) NOT NULL,
  `cr_particulars` varchar(255) NOT NULL,
  `cr_trans_id` int(11) NOT NULL,
  `total_debit` varchar(255) NOT NULL,
  `total_credit` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_journal_cr`
--

INSERT INTO `tb_journal_cr` (`cr_id`, `project_id`, `cr_or_no`, `cr_or_date`, `cr_master_name_customer`, `cr_sj_si_no`, `cr_master_name_bank`, `cr_cleared`, `cr_cleared_date`, `cr_or_amount`, `cr_particulars`, `cr_trans_id`, `total_debit`, `total_credit`) VALUES
(1, 2, '12', '08/04/2015', '007 - MICHELLE', '11', 'BDO - CURRENT ACCOUNT - 2868005848', 'Yes', '08/04/2015', '45000', 'To record revenue', 0, ' 45,000.00', ' 45,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_cr_trans`
--

CREATE TABLE IF NOT EXISTS `tb_journal_cr_trans` (
  `cr_trans_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `cr_id` int(11) NOT NULL,
  `cr_trans_account_code` varchar(255) NOT NULL,
  `cr_trans_sub_name` varchar(255) NOT NULL,
  `cr_trans_dr` varchar(255) NOT NULL,
  `cr_trans_cr` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_journal_cr_trans`
--

INSERT INTO `tb_journal_cr_trans` (`cr_trans_id`, `project_id`, `cr_id`, `cr_trans_account_code`, `cr_trans_sub_name`, `cr_trans_dr`, `cr_trans_cr`) VALUES
(1, 2, 1, '11130-11111-11112-11111', 'BDO - DOLLAR ILIGAN - 3120156870 ', '0', '45000'),
(2, 2, 1, '007', 'ACCOUNTS RECEIVABLE -  MICHELLE ', '45000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_gj`
--

CREATE TABLE IF NOT EXISTS `tb_journal_gj` (
  `gj_id` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `gj_code` varchar(255) NOT NULL,
  `gj_date` varchar(255) NOT NULL,
  `gj_cleared` varchar(255) NOT NULL,
  `gj_cleared_date` varchar(255) NOT NULL,
  `gj_amount` varchar(255) NOT NULL,
  `gj_particulars` varchar(255) NOT NULL,
  `gj_trans_id` int(11) NOT NULL,
  `total_debit` varchar(255) NOT NULL,
  `total_credit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_gj_trans`
--

CREATE TABLE IF NOT EXISTS `tb_journal_gj_trans` (
  `gj_trans_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `gj_id` int(11) NOT NULL,
  `gj_trans_account_code` varchar(255) NOT NULL,
  `gj_trans_sub_name` varchar(255) NOT NULL,
  `gj_trans_dr` varchar(255) NOT NULL,
  `gj_trans_cr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_sj`
--

CREATE TABLE IF NOT EXISTS `tb_journal_sj` (
  `sj_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `sj_si_no` varchar(255) NOT NULL,
  `sj_si_date` varchar(255) NOT NULL,
  `sj_master_name` varchar(255) NOT NULL,
  `sj_terms` varchar(255) NOT NULL,
  `sj_si_amount` varchar(255) NOT NULL,
  `sj_particulars` varchar(255) NOT NULL,
  `sj_trans_id` int(11) NOT NULL,
  `total_debit` varchar(255) NOT NULL,
  `total_credit` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_journal_sj`
--

INSERT INTO `tb_journal_sj` (`sj_id`, `project_id`, `sj_si_no`, `sj_si_date`, `sj_master_name`, `sj_terms`, `sj_si_amount`, `sj_particulars`, `sj_trans_id`, `total_debit`, `total_credit`) VALUES
(1, 2, '11', '08/03/2015', 'MICHELLE', '7', '25000', 'To record sales record', 0, ' 45,000.00', ' 45,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_journal_sj_trans`
--

CREATE TABLE IF NOT EXISTS `tb_journal_sj_trans` (
  `sj_trans_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `sj_id` int(11) NOT NULL,
  `sj_trans_account_code` varchar(255) NOT NULL,
  `sj_trans_sub_name` varchar(255) NOT NULL,
  `sj_trans_dr` varchar(255) NOT NULL,
  `sj_trans_cr` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_journal_sj_trans`
--

INSERT INTO `tb_journal_sj_trans` (`sj_trans_id`, `project_id`, `sj_id`, `sj_trans_account_code`, `sj_trans_sub_name`, `sj_trans_dr`, `sj_trans_cr`) VALUES
(1, 2, 1, '11130-11112-11113-11111', 'BANK OF THE PHILIPPINES ISLAND-9821002505 ', '25000', '0'),
(2, 2, 1, '11130-11111-11112-11111', 'BDO - DOLLAR ILIGAN - 3120156870 ', '20000', '0'),
(3, 2, 1, '007', 'SALES REVENUE -  MICHELLE ', '0', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master`
--

CREATE TABLE IF NOT EXISTS `tb_master` (
  `master_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `master_code` varchar(255) NOT NULL,
  `master_date` varchar(255) NOT NULL,
  `master_name` varchar(255) NOT NULL,
  `master_add` varchar(255) NOT NULL,
  `master_type` varchar(255) NOT NULL,
  `master_terms_payment` varchar(255) NOT NULL,
  `master_contact_person` varchar(255) NOT NULL,
  `master_position` varchar(255) NOT NULL,
  `master_tel_no` varchar(255) NOT NULL,
  `master_fax_no` varchar(255) NOT NULL,
  `master_email` varchar(255) NOT NULL,
  `master_subsidiary` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master`
--

INSERT INTO `tb_master` (`master_id`, `project_id`, `master_code`, `master_date`, `master_name`, `master_add`, `master_type`, `master_terms_payment`, `master_contact_person`, `master_position`, `master_tel_no`, `master_fax_no`, `master_email`, `master_subsidiary`) VALUES
(5, 2, '001', '07/01/2015', 'AVASIA INFORMATIONS SYSTEMS', 'SUITE 301 818 bUILDING 169 PASIG BLVD PASIG CITY', 'Supplier', '', 'N/A', 'N/A', '747-5371', '6710072', 'sales@avasiaonline.com', 'AR-T'),
(6, 2, '002', '07/01/2015', 'EAST ASIA PAPER MANUFACTURING CORP.', '433 R. Pascual St., Mandaluyong City', 'Supplier', '', 'RODERICK DELA ROSA', 'N/A', '5319626', '5321466', 'N/A', 'AR-T'),
(7, 2, '003', '07/01/2015', 'AUCTION MONSTER', 'N/A', 'Customer', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'AR-T'),
(8, 2, '004', '07/01/2015', 'ALDRICH JOSEPH NAVARRO', 'N/A', 'Employee', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'IT'),
(9, 2, '005', '07/01/2015', 'BANCO DE ORO', 'N/A', 'Bank', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'AR-T'),
(10, 2, '006', '07/01/2015', 'BANK OF THE PHILIPPINES', 'N/A', 'Bank', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'AR-T'),
(11, 2, '007', '08/17/2015', 'MICHELLE', 'VAL CITY', 'Customer', '', 'MICH', 'IT', 'N/A', 'N/A', 'N/A', ''),
(12, 2, '008', '08/14/2015', 'ANNE CRUZ', 'VAL', 'Employee', '', 'H', 'A', 'A', 'A', 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE IF NOT EXISTS `tb_project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(225) NOT NULL,
  `project_location` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`project_id`, `project_name`, `project_location`) VALUES
(1, 'Team Storm', 'EDSA Ortigas'),
(2, 'EPSI', 'Alabang'),
(3, 'PNI BIZ', 'EDSA Ortigas'),
(4, 'PNI International', 'EDSA Ortigas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_type` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `uname` varchar(225) NOT NULL,
  `pwd` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `project_id`, `user_type`, `fname`, `lname`, `uname`, `pwd`) VALUES
(1, 1, 'Administrator', 'MHon', 'Romero', 'ts', 'admin'),
(2, 2, 'Administrator', 'Michelle', 'Anne', 'admin', 'admin'),
(3, 2, 'Administrator', 'Jay', 'Quintos', 'epsi', 'admin'),
(4, 2, 'Accounting Staff', 'Ernanie', 'Dela cruz', 'acc', 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_type`
--

CREATE TABLE IF NOT EXISTS `tb_user_type` (
  `id` int(11) NOT NULL,
  `userType` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_type`
--

INSERT INTO `tb_user_type` (`id`, `userType`) VALUES
(1, 'Administrator'),
(2, 'Accounting Staff'),
(3, 'Auditor Staff'),
(4, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account_groups`
--
ALTER TABLE `tb_account_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_account_subsidiary`
--
ALTER TABLE `tb_account_subsidiary`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tb_account_title`
--
ALTER TABLE `tb_account_title`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tb_bank_recon`
--
ALTER TABLE `tb_bank_recon`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tb_copyrights`
--
ALTER TABLE `tb_copyrights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_journal_ap`
--
ALTER TABLE `tb_journal_ap`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `tb_journal_ap_trans`
--
ALTER TABLE `tb_journal_ap_trans`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `tb_journal_cd`
--
ALTER TABLE `tb_journal_cd`
  ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `tb_journal_cd_trans`
--
ALTER TABLE `tb_journal_cd_trans`
  ADD PRIMARY KEY (`cd_trans_id`);

--
-- Indexes for table `tb_journal_cr`
--
ALTER TABLE `tb_journal_cr`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `tb_journal_cr_trans`
--
ALTER TABLE `tb_journal_cr_trans`
  ADD PRIMARY KEY (`cr_trans_id`);

--
-- Indexes for table `tb_journal_gj`
--
ALTER TABLE `tb_journal_gj`
  ADD PRIMARY KEY (`gj_id`);

--
-- Indexes for table `tb_journal_gj_trans`
--
ALTER TABLE `tb_journal_gj_trans`
  ADD PRIMARY KEY (`gj_trans_id`);

--
-- Indexes for table `tb_journal_sj`
--
ALTER TABLE `tb_journal_sj`
  ADD PRIMARY KEY (`sj_id`);

--
-- Indexes for table `tb_journal_sj_trans`
--
ALTER TABLE `tb_journal_sj_trans`
  ADD PRIMARY KEY (`sj_trans_id`);

--
-- Indexes for table `tb_master`
--
ALTER TABLE `tb_master`
  ADD PRIMARY KEY (`master_id`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_user_type`
--
ALTER TABLE `tb_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account_groups`
--
ALTER TABLE `tb_account_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tb_account_subsidiary`
--
ALTER TABLE `tb_account_subsidiary`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_account_title`
--
ALTER TABLE `tb_account_title`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `tb_bank_recon`
--
ALTER TABLE `tb_bank_recon`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_copyrights`
--
ALTER TABLE `tb_copyrights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_journal_ap`
--
ALTER TABLE `tb_journal_ap`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_journal_ap_trans`
--
ALTER TABLE `tb_journal_ap_trans`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_journal_cd`
--
ALTER TABLE `tb_journal_cd`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_journal_cd_trans`
--
ALTER TABLE `tb_journal_cd_trans`
  MODIFY `cd_trans_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_journal_cr`
--
ALTER TABLE `tb_journal_cr`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_journal_cr_trans`
--
ALTER TABLE `tb_journal_cr_trans`
  MODIFY `cr_trans_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_journal_gj`
--
ALTER TABLE `tb_journal_gj`
  MODIFY `gj_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_journal_gj_trans`
--
ALTER TABLE `tb_journal_gj_trans`
  MODIFY `gj_trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_journal_sj`
--
ALTER TABLE `tb_journal_sj`
  MODIFY `sj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_journal_sj_trans`
--
ALTER TABLE `tb_journal_sj_trans`
  MODIFY `sj_trans_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_master`
--
ALTER TABLE `tb_master`
  MODIFY `master_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_user_type`
--
ALTER TABLE `tb_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
