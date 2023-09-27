-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 07:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmalogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(500) NOT NULL,
  `replies` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'Hi|hi|Hi!|hi!|Hello|hello|Hello!|hello!', 'Hello, how may we help you?<br><br>\r\n\r\nTo know more about how PharmaKonsulta works, type \"FAQs\"'),
(2, 'FAQ|FAQS|FAQS|faq|faqs', 'Thank you for wanting to learn more about our services.<br><br>\r\n\r\nTo get the answers for each question, type the question number corresponding to the said question.<br><br>\r\n\r\nCommon FAQs:<br>\r\n1. When will the the consultation session be available?<br><br>\r\n2. What is Botica Ycsobel\'s contact information<br><br>\r\n3. Can we purchase medicine from the website?'),
(3, '1|1.|Question #1|Question 1|One|Number one|Number 1', 'Our consultation sessions are available from from 8:00 AM to 6:30 PM PHT!'),
(4, '2|2.|Question #2|Question 2|Two|Number two|Number 2', 'This chatbot isn\'t currently being monitored by our pharmacists. To connect with our pharmacists, kindly refer to Botica Ycsobel\'s contact information as stated below:<br><br>\r\nContact Information<br><br>\r\nEmail:<br>botica.ycsobel@gmail.com<br><br>\r\nTelephone:<br>551-1234<br><br>\r\nContact number:<br>0912-345-6789'),
(5, '3|3.|Question #3|Question 3|Three|Number three|Number 3', 'Sadly, our customers aren\'t able to purchase the medicines displayed in our Pharmalogue as we believe that face-to-face transactions are much safer for our customers!<br><br>\r\nIf you wish to purchase any of our medicine, we suggest taking a quick trip to one of our branches!<br><br>\r\nBotica Ycsobel Branches:<br>\r\n1. Pala-o<br>\r\n2. Tambacan<br>\r\n3. Tubod<br>\r\n4. Suarez<br>\r\n5. Buru-un<br>\r\n6. Fuentes');

-- --------------------------------------------------------

--
-- Table structure for table `illness_categories`
--

CREATE TABLE `illness_categories` (
  `category_id` int(25) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `illness_categories`
--

INSERT INTO `illness_categories` (`category_id`, `category_name`) VALUES
(12, 'Analgesics (Non-Opio'),
(13, 'Nonsteroidal Anti-In'),
(14, 'Vitamins &/or Minera'),
(15, 'Vitamins & Minerals '),
(16, 'Vitamin C'),
(17, 'Supplements & Adjuva'),
(18, 'Vitamins & Minerals '),
(19, 'Cough & Cold Prepara'),
(20, 'Antiasthmatic & COPD'),
(21, 'Antihistamines & Ant'),
(22, 'Antihistamines & Ant');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_branch`
--

CREATE TABLE `pharmacy_branch` (
  `branch_ID` int(11) NOT NULL,
  `branch_Name` varchar(30) NOT NULL,
  `branch_Address` varchar(50) NOT NULL,
  `branch_OperationHours` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacy_branch`
--

INSERT INTO `pharmacy_branch` (`branch_ID`, `branch_Name`, `branch_Address`, `branch_OperationHours`) VALUES
(1, 'Palao(Main)', '67G3+PQG, Iligan City, Lanao del Norte', '24:00:00.000000'),
(2, 'Tambacan', 'NEED SPECIFICATION', '24:00:00.000000'),
(3, 'Tubod', 'NEED SPECIFICATIONN', '12:34:56.000000'),
(4, 'Suarez', 'NEED SPECIFICATIONNN', '12:34:56.000000'),
(5, 'Buru-un', 'NEED SPECIFICATIONNNN', '12:34:56.000000'),
(6, 'Fuentes', 'NEED SPECIFICATIONNNN', '12:34:56.000000');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_medicine`
--

CREATE TABLE `pharmacy_medicine` (
  `ID` int(255) NOT NULL,
  `category_id` int(25) NOT NULL,
  `generic_name` varchar(50) NOT NULL,
  `generic_pronun` varchar(50) NOT NULL,
  `drug_brand` varchar(50) NOT NULL,
  `brand_pronun` varchar(50) NOT NULL,
  `drug_category` varchar(50) NOT NULL,
  `drug_price` varchar(15) NOT NULL,
  `drug_description` varchar(1000) NOT NULL,
  `drug_image` varchar(255) NOT NULL,
  `direction_for_usage` varchar(500) NOT NULL,
  `active_ingredients` varchar(500) NOT NULL,
  `in_active_ingredients` varchar(500) NOT NULL,
  `side_effects` varchar(250) NOT NULL,
  `storage_instructions` varchar(250) NOT NULL,
  `stocks` int(150) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacy_medicine`
--

INSERT INTO `pharmacy_medicine` (`ID`, `category_id`, `generic_name`, `generic_pronun`, `drug_brand`, `brand_pronun`, `drug_category`, `drug_price`, `drug_description`, `drug_image`, `direction_for_usage`, `active_ingredients`, `in_active_ingredients`, `side_effects`, `storage_instructions`, `stocks`, `branch`) VALUES
(9, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Biogesic ', 'bayo-jeh-sic ', 'Analgesics (Non-Opioid) & Antipyretics', '4.50 PHP/Tablet', 'For the temporary relief of minor aches and pains associated with headache, muscular aches, backaches, minor arthiritis pain, common cold, toothaches, mentrual cramps, temporarily reduces fever, itchy and watery eyes due to hay fever.\r\n\r\nIt can be consumed on an empty stomach, and can be taken by pregnant women, breastfeeding moms and the elderly. \r\n', 'biogesic.png', '>1 - 2 tablets every 4-6 hours for Adults and children ages 12 years and older. \r\n    >Not advisable for children under 12 years of age.\r\n    >It is not recommended to take more than 4g (8 tablets) of Paracetamol in a \r\n      span of 24 hours because this can lead to an overdose.\r\n', 'Acetaminophen 500 mg (Pain Reliever/Fever Reducer), Dexbrompheniramine maleate 1 mg (Antihistamine)\r\n', 'dicalcium phosphate, microcrystalline cellulose, povidone, silicon dioxide, \r\n    sodium carboxymethyl starch, starch, stearic acid, talc.\r\n', '>Dizziness\r\n    >Drowsiness\r\n    >Constipation \r\n    >Upset Stomach \r\n    >Blurred vision \r\n    >Drying of mouth, nose, and throat may occur\r\n', ' Store at temperatures not exceeding 30°.Celsius', 930, 'Pala-o'),
(10, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Tempra Forte - 30mL', 'tem-prah for-te', 'Analgesics (Non-Opioid) & Antipyretics', '65.00 PHP', 'useful for reducing fever and for the temporary relief of minor aches, \r\n    pains, and discomfort associated with the common colds or flu, inoculations or vaccinations. 	\r\n    It is also valuable in reducing pain following tonsillectomy (surgical removal of \r\n    the tonsils) and adenoidectomy (surgical removal of the adenoids).\r\n    Available in different flavors: Grape, Orange, Strawberry\r\n\r\n', 'tempraforte30.png', '>2 - 5.5 mL (1/2 to 1 tsp) for ages 3 months to 1 year \r\n    >5 - 10 mL (1 to 2 tsp) for ages 1 year to 5 years\r\n    >10 - 20 mL (2 to 4 tsp) for ages 6 years to 12 years\r\n    >All doses should be taken 3-4 times daily or as prescribed by the doctor.\r\n', 'Acetaminophen ', 'artificial flavouring, artificial colouring (in cherry-flavoured only), citric acid, \r\n    glycerin, polyethylene glycol, propylene glycol, purified water, sodium citrate, \r\n    and sodium saccharin. Alcohol-, ASA-, and sucrose-free.\r\n', 'Hematological: Skin Rashes\r\n', 'Store at temperatures not exceeding 30°C. Protect from light. When stored \r\n    below 30°C and protected from light, Paracetamol (TEMPRA). The syrup will \r\n    remain stable until the expiration date indicated on the package.\r\n', 249, 'Tambacan'),
(11, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Tempra Forte - 60mL', 'tem-prah for-te', 'Analgesics (Non-Opioid) & Antipyretics', '131.25 PHP', 'useful for reducing fever and for the temporary relief of minor aches, \r\npains and discomfort associated with the common colds or flu, inoculations or vaccinations. \r\n	\r\nIt is also valuable in reducing pain following tonsillectomy (surgical removal of the tonsils) and adenoidectomy (surgical removal of the adenoids).\r\n\r\nAvailable in different flavors: Grape, Orange, Strawberry\r\n\r\n', 'tempraforte60.png', '>2 - 5.5 mL (1/2 to 1 tsp) for ages 3 months to 1 year \r\n    >5 - 10 mL (1 to 2 tsp) for ages 1 year to 5 years\r\n    >10 - 20 mL (2 to 4 tsp) for ages 6 years to 12 years\r\n    >All doses should be taken 3-4 times daily or as prescribed by the doctor.\r\n', 'Acetaminophen \r\n', 'artificial flavouring, artificial colouring (in cherry-flavoured only), citric acid, \r\n    glycerin, polyethylene glycol, propylene glycol, purified water, sodium citrate, \r\n    and sodium saccharin. Alcohol-, ASA-, and sucrose-free.\r\n', 'Hematological: Skin Rashes', 'Store at temperatures not exceeding 30°C. Protect from light.\r\n  When stored below 30°C and protected from light, Paracetamol (TEMPRA) \r\n  Syrup will remain stable until the expiration date indicated on the package.\r\n', 500, 'Tubod'),
(13, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Tempra Forte - 120mL', 'tem-prah for-te', 'Analgesics (Non-Opioid) & Antipyretics', '217.75 PHP', 'useful for reducing fever and for the temporary relief of minor aches, \r\npains and discomfort associated with the common colds or flu, inoculations or vaccinations. \r\n	\r\nIt is also valuable in reducing pain following tonsillectomy (surgical removal of the tonsils) and adenoidectomy (surgical removal of the adenoids).\r\n\r\nAvailable in different flavors: Grape, Orange, Strawberry\r\n\r\n', 'tempraforte120.png', '>2 - 5.5 mL (1/2 to 1 tsp) for ages 3 months to 1 year \r\n    >5 - 10 mL (1 to 2 tsp) for ages 1 year to 5 years\r\n    >10 - 20 mL (2 to 4 tsp) for ages 6 years to 12 years\r\n    >All doses should be taken 3-4 times daily or as prescribed by the doctor.\r\n\r\n', 'Acetaminophen \r\n', ' artificial flavouring, artificial colouring (in cherry-flavoured only), \r\n     citric acid, glycerin, polyethylene glycol, propylene glycol, purified water, \r\n     sodium citrate, and sodium saccharin. Alcohol-, ASA-, and sucrose-free.\r\n', 'Hematological: Skin Rashes', 'Store at temperatures not exceeding 30°C. Protect from light.\r\nWhen stored below 30°C and protected from light, Paracetamol (TEMPRA) Syrup will remain stable until the expiration date indicated on the package.\r\n', 40, 'Tambacan'),
(14, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Tempra Forte Tablet ', 'tem-prah for-te', 'Analgesics (Non-Opioid) & Antipyretics', '4.45 PHP/Tablet', 'Useful for reducing fever and for the temporary relief of minor aches, \r\npains and discomfort associated with the common colds or flu, inoculations or vaccinations. \r\n	\r\nIt is also valuable in reducing pain following tonsillectomy (surgical removal of the tonsils) and adenoidectomy (surgical removal of the adenoids).\r\n\r\nAvailable in different flavors: Grape, Orange, Strawberry\r\n\r\n', 'tempratablet.png', '>Half Tablet for children ages  6-12 years old\r\n    >1 - 2 tablet for children ages 12 years and older\r\n  >All doses to be taken 3-4 times daily with or without food, or as recommended by the doctor.\r\n', 'Acetaminophen', 'Butylated Hydroxyanisole, Citric Acid, D&C Red 33, Polyethylene Glycol, Purified Water, Sodium Chloride, Sodium Citrate\r\n', '>Hematological: Skin Rashes\r\n    >hypersensitivity reactions\r\n    >changes in number of white blood cells and platelets\r\n    >minor stomach and intestinal disturbances\r\n', 'Store at temperatures not exceeding 30°C. Protect from light.\r\n    When stored below 30°C and protected from light.\r\n', 600, 'Tubod'),
(15, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Kiddilets', 'kid-di-lets’', ' Analgesics (Non-Opioid) & Antipyretics', '2.75 PHP/Tablet', 'These are chewable paracetamol tablets for kids. For fever reduction.\r\n For the temporary relief of minor aches and pains such as toothache, headache, \r\n backache, menstrual cramps, muscular aches, minor arthritis pain, and pain \r\n associated with the common cold and flu.\r\n Available in different flavors: Lemon, Orange, Straberry\r\n', 'Kiddilets.jpg', '>1 tablet for ages 2 to 3 years old\r\n    >1-2 tablet for ages 4 to 6 years old\r\n    >2-3 tables for ages 7 to 12 years old\r\n    >Should be taken every 4 hours, or as recommended by the doctor \r\n', 'Acetaminophen ', 'Excipients \r\n', '>Hematological: Skin Rashes\r\n    >Minor stomach and intestinal disturbances\r\n', 'Store at temperatures not exceeding 30°C. \r\n\r\n', 55, 'All Branches'),
(16, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Tylenol', 'tai-luh-naal', 'Analgesics (Non-Opioid) & Antipyretics', '9.25 PHP/Tablet', ' Temporary relief of pain & discomfort from headache, fever, cold or flu, \r\nminor muscular aches, overexertion, menstrual cramps, toothache, minor arthritic pain. \r\n\r\nThis medicine shouldn’t be taken by those who have alcohol, liver disease, and pregnant women.\r\n', 'tylenol.png', '>1-2 tables for ages 12 years old and above\r\n    >Should be taken every 6 hours, or as recommended by the doctor \r\n', 'Acetaminophen \r\n', 'magnesium stearate, modified starch, powdered cellulose, pregelatinized starch, sodium starch glycolate\r\n', 'Allergic Reaction: Hives, difficulty in breathing,  swelling of your face, lips, tongue, or throat.\r\n', 'Store at room temperature away from light and moisture. Do not store it in the bathroom.\r\n', 56, 'Tubod'),
(17, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Calpol Infant Suspension (Oral Drops) - 120mL', 'kal-pol', 'Analgesics (Non-Opioid) & Antipyretics', '62.75PHP', 'For babies aged from 0-2 years old weighing more than 4kg and  not premature. This provides soothing relief from pain and fever for your children, when they need it most. It starts to work on fever in just 15 minutes but is still gentle on delicate tummies.Gets to work on mild to moderate fever and pain associated with: Fever and pain after Vaccination, Toothache, Headache, Migraine, Muscle ache, Sore throat, and Musculoskeletal pain\r\n', 'calpol.png', '>1.5- 2 yrs. old (26-34 pounds): 1.5- 2.3 mL\r\n    >1-1.5 yrs. old (24-26 pounds): 1.7-1.8 mL\r\n    >6-12 months old (18-24 pounds): 1.2-1.7 mL\r\n    >0-6 months old (7-18 pounds): 0.5-1.2 mL\r\nAll doses to be given every 4-6 hours, or as prescribed by the doctor.\r\n', 'Acetaminophen \r\n', 'sucrose (contains 2.2 g of sucrose per 5 ml), sorbitol liquid ((E420) contains 0.45 g sorbitol liquid per 5ml), sodium (contains 0.86mg per 5ml), propylene glycol (E1520), methyl parahydroxybenzoate (E218), ethyl parahydroxybenzoate (E214), propyl parahydroxybenzoate (E216) and carmoisine (E122). \r\n', '>Hematological: Skin Rashes\r\n    >stomach pain, nausea, and vomiting\r\n', 'Store at room temperature away from light and moisture. Do not store it in the bathroom.\r\n', 600, 'All Branches'),
(18, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Calpol Suspension', ' kal-pol', ' Analgesics (Non-Opioid) & Antipyretics', '156.00 PHP', 'For babies aged from 2-6  years old weighing more than 4kg and  not premature. This provides soothing relief from pain and fever for your children, when they need it most. It starts to work on fever in just 15 minutes but is still gentle on delicate tummies.Gets to work on mild to moderate fever and pain associated with: Fever and pain after Vaccination, Toothache, Headache, Migraine, Muscle ache, Sore throat, and Musculoskeletal pain\r\n', 'calpolsuspension.png', '>Children 5-6 yrs. old (48-53 pounds): 13-15 mL\r\n    >4-5 yrs. old (40-48 pounds): 11-13 mL\r\n    >3-4 yrs. old (33-40 pounds): 9-11 mL\r\n    >2-3 yrs. old (26-33 pounds): 8-9 mL\r\nAll doses to be given every 4-6 hours, or as prescribed by the doctor.\r\n\r\n\r\n\r\n', 'Acetaminophen \r\n', 'sucrose (contains 2.2 g of sucrose per 5 ml), sorbitol liquid ((E420) contains 0.45 g sorbitol liquid per 5ml), sodium (contains 0.86mg per 5ml), propylene glycol (E1520), methyl parahydroxybenzoate (E218), ethyl parahydroxybenzoate (E214), propyl parahydroxybenzoate (E216) and carmoisine (E122). \r\n\r\n', 'Hematological: allergic dermatitis or skin reactions.\r\n\r\n', 'Store at room temperature away from light and moisture. Do not store it in the bathroom.\r\n', 44, 'Pala-o'),
(19, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', ' Alaxan FR', 'a-lak-san ef-ar', 'Analgesics (Non-Opioid) & Antipyretics / Nonsteroi', '8.5 PHP', ' Effective for fever reduction. Used for the relief of mild to moderately severe pain of musculoskeletal origin such as muscle pain (myalgia), arthritis, rheumatism, sprain, strain, bursitis (inflammation of the fluid-filled sac or bursa that lies between a tendon and skin), tendonitis, backache and stiff neck.\r\n\r\nUsed for the relief of tension headache, dysmenorrhea, toothache, pain after tooth extraction and minor surgical operations.\r\n', 'alaxanfr.png', '1 tablet every 6 hours, or as prescribed by a doctor.', 'Acetaminophen 325mg + Ibuprofen 200 mg\r\n', 'Aspirin. Phenylbutazone, indomethacin, salicylates, other NSAIDs. Anticoagulants and thrombolytic agents. ACE inhibitors. Diuretics. Lithium. Alcohol.\r\n', '>Minor allergic-type: Skin Rashes \r\n    >GI ulceration and/or bleeding\r\n    >indigestion\r\n    >Heartburn\r\n    >Nausea & vomiting\r\n    >Anorexia\r\n    >Diarrhea\r\n    >Constipation and stomatitis\r\n    >flatulence, bloating, abdominal pain, effects on ki', 'Store at temperatures not exceeding 30°C.\r\n', 24, 'Tubod'),
(20, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Rexidol Forte', ' rek-si-dol for-te', 'Analgesics (Non-Opioid) & Antipyretics', '5.00 PHP', 'Relief of mild to moderate pain including headache, migraine, backache, muscular aches, menstrual cramps, arthritis pain, toothache and pain associated with the common cold and flu. Reduction of fever.\r\n', 'rexidol.png', '1-2 tablet every 6 hours, or as prescribed by a doctor for ages 12 years old and older\r\n', ' 500mg of Paracetamol and 65 mg of Caffeine \r\n', 'maize starch, purified talc, pregelatinised\r\n\r\n', '>Paracetamol: Hypersensitivity including skin rashes, and minor stomach and \r\n    intestinal disturbances. \r\n   >Caffeine: Tremor, difficulty of sleeping, nervousness, restlessness, irritability, \r\n   anxiety, headache, ringing of the ears, fast or i', 'Store at temperatures not exceeding 30°C.\r\n', 32, 'Buru-un'),
(21, 0, 'Acetaminophen | Paracetamol ', 'a-set-a-mee\'-noe-fen | par-a-ce-ta-mol', 'Saridon', 'sa-ri-don', 'Analgesics (Non-Opioid) & Antipyretics', '7.25 PHP', 'For fast and effective relief of mild to severe headaches. For the relief of pain such as headache, toothache, menstrual discomfort, postoperative and rheumatic pain. For the relief of pain and fever associated with colds and \"flu\".\r\n\r\n', 'saridon.png', '>1-2 tablet every 6 hours, or as prescribed by a doctor for adults\r\n    >1 tablet every 6 hours, or as prescribed by a doctor for ages 12 years old to \r\n      16 years old.\r\n  >It is recommended that Saridon Triple Action should not be used during pregnancy, particularly in the first trimester and in the final six weeks.\r\n', ' Paracetamol 250 mg, Propyphenazone 150 mg, Caffeine 50 mg.\r\n', 'cellulose, corn starch, magnesium stearate, sodium starch, glycolate\r\n', '>Abdominal pain\r\n    >Skin rashes\r\n    >Heart palpitations\r\n    >The tablet can cause some anxiety, restlessness and nervousness\r\n    >Loss of appetite\r\n    >Sleep disorders\r\n    >Insomnia\r\n', 'Store at temperatures not exceeding 25°C.\r\n', 399, 'Fuentes'),
(22, 0, 'Mefenamic Acid', 'meh-fe-na-mik a-sid', 'Dolfenal ', ' dol-fe-nhul ', 'Nonsteroidal Anti-Inflammatory Drugs (NSAIDs)', '16.75 PHP 	', 'Symptomatic relief of mild to moderate pain including headache, dental pain, post-operative and post-partum pain, primary dysmenorrhea, and menorrhagia. Symptomatic relief of musculoskeletal and joint disorders including osteoarthritis and rheumatoid arthritis.\r\n', 'dolfenal.png', '1 tablet every 8 hours, or as prescribed by the physician for ages 15 years and older.\r\n\r\n', 'Paracetamol 250 mg, Propyphenazone 150 mg, Caffeine 50 mg.\r\n', 'Corn starch pregelatinized, methyl cellulose, sodium lauryl sulphate, microcrystalline cellulose, corn starch, silicon dioxide colloidal, magnesium stearate, purified water.\r\n', '>Abdominal pain, constipation, diarrhea, dyspepsia, flatulence, gross bleeding/perforation, heartburn, nausea, gastrointestinal ulcers (gastric/duodenal\r\n    >vomiting, abnormal kidney function, anemia, dizziness, edema, elevated liver enzymes, heada', 'Store at temperatures not exceeding 25°C.\r\n', 23, 'All Branches'),
(23, 0, 'Mefenamic Acid', 'meh-fe-na-mik a-sid', 'Ponstan ', 'pon-stan', 'Nonsteroidal Anti-Inflammatory Drugs (NSAIDs)', '39.25 PHP', 'used to relieve the symptoms of period pain and treat heavy periods. It also provides short term relief of pain in conditions such as: muscle and joint injuries such as sprains, strains and tendonitis, dental pain. \r\n', 'ponstan.png', '1 tablet every 8 hours, or as prescribed by the physician for ages 15 years and older.\r\n', 'Mefenamic Acid', 'Lactose monohydrate, Titanium dioxide, Iron oxide yellow, Brilliant blue, Gelatin, Carbon black\r\n', '>Stomach upset including nausea (feeling sick)\r\n    >Vomiting\r\n    >Heartburn\r\n    >Indigestion\r\n    >Cramps\r\n    >Loss of appetite\r\n    >Constipation & Diarrhea\r\n    >Dizziness, light-headedness\r\n    >Drowsiness\r\n    >Sleeplessness\r\n    >Allergic Re', 'Store at temperatures not exceeding 25°C.\r\n\r\n', 199, 'All Branches'),
(24, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Enervon C Tablet', ' eh-ner-vohn see', 'Vitamins &/or Minerals', '6.75 PHP', ' A nutritional supplement to help promote increased energy and enhance the immune system. For the treatment of Vitamin B-complex deficiencies and Vitamin C deficiencies.\r\n', 'enervon.png', '>1 tablet daily, or as prescribed by the doctor. \r\n    >Enervon® is formulated for adults 18 years old and above.\r\n   >supplement is safe to take while pregnant and breastfeeding in normal doses.\r\n\r\n', 'Thiamine Mononitrate (Vitamin B1) 50 mg, Riboflavin (Vitamin B2) 20 mg, \r\n   Pyridoxine Hydrochloride (Vitamin B6) 5 mg, Cyanocobalamin (Vitamin B12) 5 \r\n  mcg, Nicotinamide 50 mg, Calcium Pantothenate 20 mg, Ascorbic Acid \r\n  (Vitamin C) 500 mg.\r\n', 'N/A', '>headache, fatigue, insomnia.\r\n    >stomach cramps, nausea and vomiting.\r\n    >skin reactions and manifestations of the respiratory system.\r\n   >hyperoxaluria and the formation of kidney stones of calcium oxalate (when used in high doses).\r\nNote: Not', 'Best stored at room temperature away from direct light and moisture. Store at temperatures not exceeding 30°C. To prevent drug damage, you should not store Enervon-C in the bathroom or the freezer. ', 349, 'Suarez'),
(25, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Revicon ', 'rhe-vhe-kon', 'Vitamins &/or Minerals', ' 5.5 PHP', 'A nutritional supplement to help promote increased energy and enhance the immune system - it contains essential multivitamins, minerals, and amino acids to help keep your muscles, bones, blood, eyes, and heart healthy, helping you be productive at work. For the treatment of Vitamin B-complex deficiencies and Vitamin C deficiencies.\r\n', 'revicon.png', '>1-2 tablets daily, or as prescribed by the doctor. \r\n    >Revicon® Forte is formulated for adults 18 years old and above. \r\n   >supplement is not recommendable for breastfeeding women as it contains a relatively higher amount of vitamin A than what is recommended during breastfeeding. \r\n', 'Multivitamins, minerals, amino acids.\r\n', 'N/A', '>Dermatitis and photosensitivity reactions.\r\n    >yellow-orange discoloration to urine. \r\n    >epigastric pain/discomfort, nausea, diarrhea, or constipation\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effe', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 55, 'Tubod'),
(26, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Stresstab', 'stres-tab', 'Vitamins &/or Minerals', '11.25 PHP', 'Multivitamins + Iron (Stresstabs) is indicated for the prevention and treatment of Vitamin B-complex (helps preserve skin health), Vitamin C(helps promote collagen), Vitamin E(helps protect the skin) and Iron deficiencies during periods of stress. Stresstabs is specifically formulated to help replenish nutrients lost due to stress.\r\n', 'stresstab.png', '>1 tablet daily, or as prescribed by the doctor ages 18 years old and older.\r\n   >supplement is not recommendable for breastfeeding women as it contains a relatively higher amount of vitamin A than what is recommended during breastfeeding. \r\n', 'Vitamin C, E, and Iron -  includes eight (8) B-complex Vitamins (B1, B2, B6, B12, Biotin, Nicotinamide, Pantothenic Acid, and Folic Acid) at safe levels\r\n', 'N/A', '>Constipation, diarrhea, or upset stomach\r\n  >Rare Reaction:  allergic reaction - rash, itching/swelling (especially of the \r\n    face/tongue/throat), severe dizziness, trouble breathing.\r\nNote: Not everyone experiences these side effects. Additional', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n\r\n', 564, 'All Branches'),
(27, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Sangobion', 'sang-goh-byuhn', 'Vitamins & Minerals (Pre & Post Natal) / Antianemi', '30.00 PHP', 'Multivitamins + iron + Calcium (Sangobion Forte) a drug that treats and prevents anemia caused by a lack of iron and other minerals involved in hematopoiesis, also, it treats Vitamin Deficiency, Folic Acid Deficiency, Vitamin B12 Deficiency, and Skin infections. This is also used to supplement folic acid, vitamin B12 in women during pregnancy and lactation.\r\n\r\n', 'sangobion.png', '>1 tablet daily, or as prescribed by a  healthcare professional for children ages 12 years old and older.\r\n   >1-2 tablets daily, or as prescribed by  a  healthcare professional for adults and women during pregnancy.\r\n\r\n', ' Iron Gluconate, Manganese Sulfate, Copper Sulfate, Vit C, Folic Acid, Vit B12, Sorbitol\r\n', 'N/A', '>Vomiting\r\n    >Dizziness\r\n    >Abdominal bloating\r\n    >Redness\r\n    >Dark stool\r\n    >Temporary faintness\r\n    >Continuing Constipation\r\n    >Diarrhea\r\n    >Allergic reactions\r\nNote: Not everyone experiences these side effects. Additionally, there ', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 567, 'All Branches'),
(28, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Hemarate FA', 'N/A', 'Vitamins & Minerals (Pre & Post Natal) / Antianemi', '25.25 PHP', 'Hemarate® FA that addresses iron-deficiency and iron-deficiency anemia. With regular intake, it can increase Hemoglobin and Hematocrit levels.\r\n\r\n', 'hemaratefa.png', '>1 tablet daily, or as prescribed by a  healthcare professional for children ages 18 years old and older.\r\n  >1 tablet daily, or as prescribed by  a  healthcare professional for women during pregnancy.\r\n', 'Elemental Fe (as Fe sulfate), folic acid, vit B6, vit B12\r\n\r\n', 'N/A', '>Nausea\r\n    >Vomiting\r\n    >Bloating\r\n    >upper abdomninal discomfort\r\n    >diarrhea or constipation.\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any concerns about ', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 324, 'Tambacan'),
(29, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Centrum Advance ', ' sen-troom ad-vans', 'Vitamins &/or Minerals', '10.50 PHP', 'Multivitamins+Minerals (Centrum Advance) is specially formulated to help protect your entire body with a wide range of vitamins, minerals, and antioxidants. Prevention & treatment of vit & mineral deficiencies.\r\n', 'centrumadvance.png', '>1 tablet daily, or as prescribed by a  healthcare professional for children ages 18 years old and older.\r\n', 'Acetate &, Beta-Carotene (Vitamin A), Thiamine Nitrate (Vit B1), Riboflavin (Vit B2), Nicotinamide (Vit B3), Pantothenic Acid (Vit B5) (as Calcium Pantothenate), Pyridoxine Hydrochloride (Vit B6), Biotin (Vit B7), Folic Acid (Vit B9), Cyanocobalamin (Vit B12), Ascorbic Acid (Vit C), Vitamin D3, IU dl-Alpha-Tocopheryl Acetate (Vit E), Vitamin K1, Calcium (as Calcium Carbonate and Calcium, Hydrogen Phosphate Anhydrous), Chromium (as Chloride), Copper (as Sulfate Anhydrous), Iodine (as Potassium Io', 'N/A', '>abdominal discomfort\r\n    >Constipation\r\n    >Diarrhea\r\n    >Nausea\r\n    >stomach discomfort \r\n    >hypersensitivity.\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any ', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 560, 'All Branches'),
(30, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'ImmunPro', ' im-myun pro', 'Vitamins &/or Minerals', ' 7.50 PHP', 'Immunpro Sodium Ascorbate Zinc is a nutritional supplement for the treatment and prevention of vitamin C and zinc deficiencies. Vitamin C and Zinc together help the body\'s natural defense against damaging free radicals (antioxidant effect) and help boost the immune system.\r\n', 'immunopro.png', '1 tablet daily, or as prescribed by a  healthcare professional for children ages 18 years old and older.\r\n', 'Sodium Ascorbate (Vitamin C), Zinc Sulfate Monohydrate\r\n', 'N/A', 'stomach and intestines disturbances\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any concerns about a side effect, please consult your doctor or pharmacist.\r\n', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 700, 'Buru-un'),
(31, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Poten Cee Sugar Free', 'poh-ten see', ' Vitamin C', ' 6.50 PHP', 'Ascorbic Acid (Poten-Cee) is a Vitamin C that helps boost immunity against colds, flu and other upper respiratory ailments and \r\nis essential in the production of collagen for healthy skin and hair.\r\n', 'potencee.png', '1-2 tablets daily, or as prescribed by a  healthcare professional for children ages 12 years old and older.', 'Hydrolyzed collagen, Ascorbic acid, Magnesium stearate, and Silicon dioxide.\r\n', 'Rice flour.\r\n', 'Stomach upset and diarrhea\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any concerns about a side effect, please consult your doctor or pharmacist.\r\n', 'Store at temperatures not exceeding 25°C. Protect from light.. \r\n', 43, 'All Branches'),
(32, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Cecon', 'see-kon', 'Vitamin C', '9.65 PHP', 'Cecon is a chewable, orange-flavored tablet used to prevent or treat low levels of vitamin C in people who do not get enough of the vitamin from their diets. Vitamin C plays an important role in the body. Strengthens immune system. Antioxidant. Stimulates collagen synthesis. Helps in wound healing and regeneration process.\r\n', 'Cecon.png', '1-2 tablets daily, or as prescribed by a  healthcare professional for children ages 18 years old and older.\r\n\r\n', 'Ascorbic acid, Sodium ascorbate\r\n\r\n', 'N/A', '>Diarrhea\r\n    >Nausea\r\n    >Vomiting\r\n    >abdominal cramps/pain\r\n    >heartburn\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any concerns about a side effect, please ', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n\r\n', 200, 'Tambacan'),
(33, 0, 'Multivitamins', 'muhl-tay-vhai-ta-mins', 'Ad-C Plus', 'see-kon', 'Vitamin C / Vitamins &/or Minerals / Supplements &', '9.50 PHP', 'Prevents and treats vitamin C deficiency. Supports healthy immune system. Hasten wound healing and helps increase body resistance to severe infections and common colds. Prevents growth retardation, immune dysfunction, delayed sexual maturation, anorexia, diarrhea & delayed wound healing and neural tube defects.\r\n\r\n', 'Ad-C Plus.png', '>1 tablet daily, or as prescribed by a  healthcare professional for children ages 18 years old and older.\r\n    >Prescription from the doctor is needed for pregnant and lactating moms. \r\n\r\n', 'ascorbic acid and zinc (as elemental).\r\n', 'N/A', '>Ascorbic acid: GI disturbances in large dose (2 g/day). Heartburn, stomach cramps.\r\n  >Zinc: Abdominal pain. Gastric irritation, irritability, lethargy, anemia, and dizziness.\r\nNote: Not everyone experiences these side effects. Additionally, there m', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 350, 'Suarez'),
(34, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Solmux Advance', ' see-kon', 'Cough & Cold Preparations', ' 13.00 PHP', 'Solmux Advance fights cough due to viruses because of its combination of Carbocisteine which causes phlegm to melt, making it easier to cough up and expel. Reduces and removes bacteria in phlegm. Zinc helps boost immunity. Functions as an antioxidant. \r\n\r\n', 'solmuxadvance.png', '1 tablet every 8 hours, or as prescribed by a  healthcare professional for ages 12 years old and older.\r\n', ' Carbocisteine (500mg), Zinc (5mg)\r\n', 'N/A', '>Nausea\r\n    >stomach discomfort\r\n    >Diarrhea\r\n    >skin rashes\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any concerns about a side effect, please consult your doc', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 398, 'Fuentes'),
(35, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Tuceran', 'see-kon', 'Cough & Cold Preparations', '10.75 PHP', 'This medicine is used for the relief of cough, clogged nose, postnasal drip, headache, body aches, and fever associated with the common cold, sinusitis, flu, and other minor respiratory tract infections. It also helps decongest sinus openings and passages.\r\n\r\n', 'Tuseran.png', '1 tablet every 6 hours, or as prescribed by a  healthcare professional for ages 12 years old and older.\r\n\r\n', 'Dextromethorphan HBr (antitussive), Phenylpropanolamine HCl (nasal decongestant) and Paracetamol (fever reducer and pain reliever).\r\n\r\n', 'N/A', '>Nausea\r\n    >Vomiting\r\n    >stomach discomfort\r\n    >Constipation\r\n    >Dizziness\r\n    >Drowsiness\r\n    >Excitation\r\n    >mental confusion\r\n    >Hypersensitivity\r\nNote: Not everyone experiences these side effects. Additionally, there may be some sid', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n\r\n', 600, 'Tubod'),
(36, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Symdex', 'see-kon', 'Cough & Cold Preparations', '4.25  PHP', 'This medicine is used to temporarily relieve symptoms caused by the common cold, flu, allergies, or other breathing illnesses (such as sinusitis, bronchitis). Antihistamines help relieve watery eyes, itchy eyes/nose/throat, runny nose, and sneezing. Decongestants help to relieve stuffy nose and ear congestion symptoms.\r\n', 'Symdex.png', '>1 tablet every 6 hours, or as prescribed by a  healthcare professional for ages 13 years old and older.\r\n   >Half a table every 6 hours, or as prescribed by a healthcare professional for ages 7 to 12 years old.\r\n', 'Dextromethorphan HBr (antitussive), Phenylpropanolamine HCl (nasal decongestant) and Paracetamol (fever reducer and pain reliever).\r\n\r\n', 'N/A', '>Drowsiness\r\n    >decreased mental alertness\r\n    >dizziness headache\r\n    >blurred vision\r\n    >Fatigue\r\n    >Weakness\r\n    >dry mouth\r\n    >increased blood pressure\r\nNote: Not everyone experiences these side effects. Additionally, there may be some', 'Store at temperatures not exceeding 30°C. Protect from light..', 320, 'Tambacan'),
(37, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Neozep', 'see-kon', 'Cough & Cold Preparations', '6.50  PHP', 'These medicines are used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections. They also help decongest sinus openings and passages.\r\n', 'Neozep.png', '1 tablet every 6 hours, or as prescribed by a  healthcare professional for ages 12 years old and older.\r\n', 'Phenylephrine HCl, Chlorphenamine Maleate and Paracetamol\r\n', 'N/A', '>tremor (muscle shaking)\r\n    >restlessness, anxiety (feeling of uneasiness)\r\n    >insomnia/sleeplessness\r\n    >nervousness, dizziness\r\n    >increased blood pressure\r\n    >Palpitation\r\n    >arrhythmia (irregular heart beat)\r\n    >Weakness\r\n    >respi', 'Store at temperatures not exceeding 30°C. Protect from light.', 270, 'Suarez'),
(38, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Decolgen', 'see-kon', 'Cough & Cold Preparations', '6.50  PHP', 'These medicines are used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections. They also help decongest sinus openings and passages.\r\n', 'decolgen.png', '1 tablet every 6 hours, or as prescribed by a  healthcare professional for ages 12 years old and older.\r\n', 'Phenylephrine HCl, Chlorphenamine Maleate and Paracetamol\r\n', 'N/A', '>tremor (muscle shaking)\r\n    >restlessness, anxiety (feeling of uneasiness)\r\n    >insomnia/sleeplessness\r\n    >nervousness, dizziness\r\n    >increased blood pressure\r\n   >Palpitation\r\n   >arrhythmia (irregular heart beat)\r\n   >Weakness\r\n   >respirato', ' Store at temperatures not exceeding 30°C. Protect from light.. \r\n\r\n', 230, 'Tambacan'),
(39, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Nasatapp', 'see-kon', 'Cough & Cold Preparations', '8.50  PHP', ' Indicated for allergic and vasomotor or other hyperactive nasal disorders and acute coryza, relief of nasal congestion and hypersecretion. Relief of nasal congestion in infants up to children 12 years of age.\r\n', 'Nasatapp.png', '1 tablet twice a day, or as prescribed by a  healthcare professional \r\n', ' phenylpropanolamine HCl and brompheniramine maleate\r\n', 'N/A', '>Severe hypertension\r\n    >Drowsiness\r\n    >Lassitude\r\n    >Nausea\r\n    >Giddiness\r\n    >dry mouth\r\n    >Mydriasis\r\n    >increased irritability and excitement.\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side e', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 560, 'Tubod'),
(40, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Bioflu', 'see-kon', 'Cough & Cold Preparations', '9.00  PHP', ' Bioflu® provides relief from flu and its multiple symptoms such as fever, body pain, headache, colds, cough from post-nasal drip and sore throat.\r\n', 'bioflu.png', '1 tablet every 6 hours, or as prescribed by a  healthcare professional for ages 12 years and older\r\n', 'Phenylephrine HCl, chlorphenamine maleate, paracetamol\r\n', 'N/A', '>tremor (muscle shaking)\r\n    >restlessness, anxiety (feeling of uneasiness)\r\n    >insomnia/sleeplessness\r\n    >nervousness, dizziness\r\n    >increased blood pressure\r\n    >Palpitation\r\n    >arrhythmia (irregular heart beat)\r\n    >Weakness\r\n    >respi', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 98, 'Fuentes'),
(41, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Ascof Forte for Adults', 'see-kon', 'Antiasthmatic & COPD Preparations / Cough & Cold P', '8.50  PHP', 'For the relief of mild to moderate cough due to common colds, flu and mild to moderate acute bronchitis; for relief of reversible mild to moderate bronchospasm in adults and children 2 years of age and older with obstructive airway disease such as asthma and chronic bronchitis.\r\n', 'Ascof Forte.png', 'Take three times a day, or as prescribed by a  healthcare professional for ages 13 years and older\r\n', 'Phenylephrine HCl, chlorphenamine maleate, paracetamol\r\n', 'N/A', 'None were reported. \r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any concerns about a side effect, please consult your doctor or pharmacist.\r\n', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 35, 'Tambacan'),
(42, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'ASCOF for kids', 'see-kon', 'Antiasthmatic & COPD Preparations / Cough & Cold P', ' 155.50  PHP', 'For the relief of mild to moderate cough due to common colds, flu and mild to moderate acute bronchitis; for relief of reversible mild to moderate bronchospasm in adults and children 2 years of age and older with obstructive airway disease such as asthma and chronic bronchitis.\r\n\r\nFlavors: Strawberry, Ponkan, Grapes\r\n\r\n', 'Ascof Kids.png', '>15 mg/kg/dose (or 0.25 mL/kg/dose) administered 3 times a day, or as prescribed by the physician.\r\n   >2-4 years old (10 to 15.5 kg): ½-1 teaspoonful 3 times a day,  or as prescribed by the physician.\r\n   >4-6 years old (15.5 to 20 kg): 1 teaspoonful 3 times a day,  or as prescribed by the physician.\r\n   >6-12 years old (20-40 kg): 1½-2 teaspoonfuls 3 times a day,  or as prescribed by the physician.\r\n  >13 years old and above (over 40 kg): 2 teaspoonfuls 3 times a day,  or as prescribed by the ', ' Phenylephrine HCl, chlorphenamine maleate, paracetamol\r\n', 'N/A', '>Itchiness\r\n    >Nausea\r\n    >vomiting and diarrhea \r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any concerns about a side effect, please consult your doctor or pharma', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 430, 'Pala-o'),
(43, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Robitussin Soft Gel', 'Antiasthmatic & COPD Preparations / Cough & Cold P', 'see-kon', '12.00  PHP', 'Guaifenesin (Robitussin) provides symptomatic relief from congested chests which may be associated with the common cold and increase the flow of natural secretions along the lower respiratory tract. It is also used to reduce sticky phlegm.\r\n', 'Robitussin Soft Gel.png', '>1 tablet every 4 hours for ages 6 - 12 years old \r\n    >1-2 tablet every 4 hours for ages 12 years and older\r\n', 'DEXTROMETHORPHAN HYDROBROMIDE\r\n', 'FD&C Blue No.1, FD&C Red No. 40, Coconut Oil, Gelatin, Glycerin, Mannitol, Polyethylene Glycol, Povidone, Propyl Gallate, Propylene Glycol, Water, Sorbitol.\r\n\r\n', '>Nausea\r\n    >Vomiting\r\n    >Hypersensitivity\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any concerns about a side effect, please consult your doctor or pharmacist.\r\n', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 641, 'Tubod'),
(44, 0, 'Dextromethorphan | Coughs and Cold', 'muhl-tay-vhai-ta-mins', 'Decolcin ', 'see-kon', 'Cough & Cold Preparations', '14.00  PHP', ' For the relief of cough, clogged nose, postnasal drip, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections. It also helps decongest sinus opening and passages.\r\n', 'decolsin.png', '1 tablet every 6 hours for ages 12 years and older\r\n\r\n', 'Dextromethorphan, Phenylpropanolamine, and Paracetamol\r\n', 'N/A', '>Nausea\r\n    >Vomiting\r\n    >stomach discomfort\r\n    >Constipation\r\n    >Dizziness\r\n    >Drowsiness\r\n    >Excitation\r\n    >mental confusion\r\n    >Hypersensitivity\r\nNote: Not everyone experiences these side effects. Additionally, there may be some sid', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 340, 'Suarez'),
(45, 0, 'Antihistamine ', 'muhl-tay-vhai-ta-mins', 'Allerkid', 'see-kon', 'Antihistamines & Antiallergics', '282.50  PHP', 'These medicines are used for the relief of symptoms associated with: Allergic rhinitis such as sneezing, runny, itchy nose; and itchy, watery eyes; Allergic conjunctivitis; Skin symptoms of allergy such as itch and rash.\r\n', 'Allerkid.png', '>2.5 mg once a day for infants ages 6 months to 12 months\r\n    >2.5 mg once or twice a day for children ages 12 months to 2 years old\r\n    >5mL every 12 hours for children ages 2 to 5 years old\r\n    >10mL every 12 hours for children ages 6 to 12 years old\r\n', 'Cetirizine dihydrochloride\r\n', 'N/A', '>Headache\r\n    >Sore throat\r\n    >Stomach pain\r\n    >Coughing\r\n    >Drowsiness/Sleepiness\r\n    >Diarrhea\r\n    >Bronchospasm (sudden, uncontrolled narrowing of airways in lungs);\r\n    >Epistaxis (nose bleeding); \r\n    >Nausea;\r\n    >Vomiting.\r\n\r\nNote:', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n\r\n', 300, 'Suarez'),
(46, 0, 'Antihistamine ', 'muhl-tay-vhai-ta-mins', 'Alnix Plus Tablet', 'see-kon', 'Antihistamines & Antiallergics / Cough & Cold Prep', '25.75  PHP', 'This medicine is used for the relief of clogged nose; sneezing; runny, itchy nose; and itchy, watery eyes associated with allergic rhinitis.\r\n', 'Alnix Plus Tablet.png', '1 tablet every 12 hours for ages 12 years old and older, or as directed by a doctor.\r\n', 'cetirizine and phenylephrine HCI.\r\n ', 'lactose; magnesium stearate; povidone; titanium dioxide; hydroxypropyl methylcellulose; polyethylene glycol; and corn starch.\r\n', '>Headache\r\n    >Sore throat\r\n    >Stomach pain\r\n    >Coughing\r\n    >Drowsiness/Sleepiness\r\n    >Diarrhea\r\n    >Bronchospasm (sudden, uncontrolled narrowing of airways in lungs);\r\n    >Epistaxis (nose bleeding); \r\n    >Nausea;\r\n    >Vomiting.\r\n\r\nNote:', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 300, 'Tubod'),
(47, 0, 'Antihistamine ', 'muhl-tay-vhai-ta-mins', 'Allerzet Tablet', 'see-kon', 'Antihistamines & Antiallergics / Cough & Cold Prep', '27.00  PHP', 'This medicine is used for: Allergic rhinitis: Symptomatic relief of seasonal (e.g., hay fever) and perennial allergic rhinitis.\r\nChronic idiopathic urticaria: Symptomatic treatment of uncomplicated skin manifestations.\r\n', 'Allerzet Tablet.png', '1 tablet once a day at bedtime for ages 12 years and older, or as recommended by a healthcare professional\r\n', ' cLevocetirizine dihydrochloride\r\n', ' Lactose microcrystalline cellulose maize starch pregelatinised maize starch silicon dioxide magnesium stearate Opadry Clear YS-1R-7006 carnauba wax purified talc, lactose and gluten\r\n', '>Diarrhea\r\n    >Constipation\r\n    >otitis media\r\n    >Vomiting\r\n    >Cough\r\n    >dry mouth\r\n    >Fatigue\r\n    >headache\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not listed above. If you have any', ' Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 300, 'Tambacan'),
(48, 0, 'Antihistamine ', 'muhl-tay-vhai-ta-mins', 'Lorapaed', 'see-kon', 'Antihistamines & Antiallergics / Cough & Cold Prep', '285.00  PHP', 'This medicine is used for the relief of clogged nose, sneezing, runny, itchy nose, and itchy, watery eyes associated with allergic rhinitis.\r\n', 'Lorapaed.png', '>2.5mL for children ages 2 years old and older and weighs 30kg or less \r\n    >5mL for children ages 2 years old and older and weighs more than 30 kg\r\n', 'Loratadine and Phenylephrine HCI.\r\n', 'corn starch, lactose, and magnesium stearate.\r\n', '>Headache\r\n    >Nausea\r\n    >dry mouth\r\n    >Tiredness\r\n    >difficulty sleeping\r\n    >increased appetite\r\n    >increased weight\r\n    >palpitations.\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not ', 'Store at temperatures not exceeding 30°C. Protect from light..', 300, 'Tubod'),
(49, 0, 'Antihistamine ', 'muhl-tay-vhai-ta-mins', 'Benadryl', 'see-kon', 'Antihistamines & Antiallergics / Cough & Cold Prep', '285.00  PHP', 'Benadryl® AH offers effective restful relief from allergies for adults -  used to relieve symptoms of allergy, hay fever, and the common cold. These symptoms include rash, itching, watery eyes, itchy eyes/nose/throat, cough, runny nose, and sneezing. It is also used to prevent and treat nausea, vomiting and dizziness caused by motion sickness. \r\n', 'Benadryl.png', '1 tablet every 6 to 8 hours as directed by the doctor.\r\n', 'Diphenhydramine Hydrochloride\r\n', 'Citric acid, D&C Red No. 33, FD&C Red No. 40, flavoring, purified water, sodium citrate, and sucrose\r\n', '>Headache\r\n    >Nausea\r\n    >dry mouth\r\n    >Tiredness\r\n    >difficulty sleeping\r\n    >increased appetite\r\n    >increased weight\r\n    >palpitations.\r\nNote: Not everyone experiences these side effects. Additionally, there may be some side effects not ', 'Store at temperatures not exceeding 30°C. Protect from light.. \r\n', 345, 'Buru-un');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `branch_ID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleInitial` varchar(5) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `nameSuffix` varchar(10) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `birthDate` date NOT NULL,
  `email` varchar(60) NOT NULL,
  `workingHours` int(2) NOT NULL,
  `userType` enum('admin','clerk') NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `branch_ID`, `firstName`, `middleInitial`, `surname`, `nameSuffix`, `contactNumber`, `birthDate`, `email`, `workingHours`, `userType`, `password`) VALUES
(1, 1, 'Usha Nicole', 'C.', 'Cobrado', 'N/A', '09267217905', '2002-10-11', 'ushanicole.cobrado@g.msuiit.edu.ph', 8, 'admin', 'admin1!!'),
(2, 2, 'Nina Eunice', 'M.', 'Sacala', 'N/A', '09123456789', '2000-01-01', 'ninaeunice.sacala@g.msuiit.edu.ph', 10, 'clerk', 'admin1!!'),
(3, 1, 'Jaymark', 'M.', 'Edayan', 'N/A', '09123456780', '2000-10-10', 'jaymark.edayan@g.msuiit.edu.ph', 10, 'admin', 'Adminn1!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `illness_categories`
--
ALTER TABLE `illness_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `pharmacy_branch`
--
ALTER TABLE `pharmacy_branch`
  ADD PRIMARY KEY (`branch_ID`);

--
-- Indexes for table `pharmacy_medicine`
--
ALTER TABLE `pharmacy_medicine`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_ID` (`branch_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `illness_categories`
--
ALTER TABLE `illness_categories`
  MODIFY `category_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pharmacy_branch`
--
ALTER TABLE `pharmacy_branch`
  MODIFY `branch_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pharmacy_medicine`
--
ALTER TABLE `pharmacy_medicine`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`branch_ID`) REFERENCES `pharmacy_branch` (`branch_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
