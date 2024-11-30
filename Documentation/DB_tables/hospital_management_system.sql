-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 07:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `status` enum('published','draft','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `author`, `status`, `created_at`) VALUES
(38, 'Understanding Heart Diseases: Types, Causes, Symptoms, and Prevention', 'What Are Heart Diseases?\r\n\r\nHeart diseases refer to conditions that impair the heart\'s ability to function efficiently. The most common types include:\r\nCoronary Artery Disease (CAD): Blockages in the coronary arteries due to plaque buildup, reducing blood flow to the heart.\r\nHeart Attack: Also known as myocardial infarction, it occurs when a coronary artery is completely blocked, cutting off blood supply to part of the heart muscle.\r\nHeart Failure: The heart becomes weak and cannot pump blood effectively.\r\nArrhythmias: Abnormal heart rhythms, such as atrial fibrillation or tachycardia.\r\nCongenital Heart Defects: Structural problems in the heart present at birth.\r\n\r\nCommon Causes of Heart Diseases:\r\nSeveral factors contribute to the development of heart diseases:\r\nUnhealthy Lifestyle Choices: Poor diet, lack of exercise, smoking, and excessive alcohol consumption.\r\nHigh Blood Pressure: Increases the strain on the heart and arteries.\r\nHigh Cholesterol Levels: Leads to plaque buildup in arteries.\r\nDiabetes: Damages blood vessels and increases the risk of CVD.\r\nObesity: Adds stress to the heart and raises blood pressure and cholesterol levels.\r\nFamily History: Genetics can play a role in susceptibility to heart diseases.\r\n', '6746269fa6f6a-heart_blog.jpg', 'Dr. Sania Hassan', 'published', '2024-11-26 19:50:55'),
(39, ' Understanding Lung Disorders: Causes, Symptoms, and Prevention', 'Common Lung Disorders:\r\n1. Asthma: Chronic inflammation of airways causing wheezing, coughing, and shortness of breath.\r\n2. Chronic Obstructive Pulmonary Disease (COPD): Includes emphysema and chronic bronchitis, often linked to smoking.\r\n3. Pneumonia: Infection that inflames air sacs in one or both lungs.\r\n4. Tuberculosis (TB): A contagious bacterial infection affecting the lungs.\r\n5. Lung Cancer: Uncontrolled cell growth in lung tissues, often linked to smoking or environmental toxins.\r\n\r\nSymptoms to Watch For:\r\n. Persistent cough\r\n. Shortness of breath\r\n. Chest pain \r\n. Wheezing\r\nSeek medical advice if symptoms persist or worsen.\r\n\r\nPrevention Tips:\r\n1. Avoid Smoking: The leading cause of many lung diseases.\r\n2. Stay Active: Exercise strengthens lung capacity.\r\n3. Minimize Exposure: Avoid pollutants and allergens.\r\n4. Vaccinate: Protect against flu and pneumonia.\r\n5. Healthy Diet: Support lung health with fruits, vegetables, and hydration.\r\n\r\nConclusion:\r\nLung health is crucial for overall well-being. Recognize the signs of lung disorders early and adopt a healthy lifestyle to protect your respiratory system. Prioritize your breathing—it’s the essence of life!', '674626ffdc522-lungs_blog.jpg', 'Dr. Hassan Raza', 'published', '2024-11-26 19:52:31'),
(40, 'Understanding Kidney Failure: Causes, Symptoms, and Prevention', 'Kidney failure, also known as renal failure, occurs when the kidneys lose their ability to filter waste and excess fluids from the blood effectively. This condition can lead to serious health complications if left untreated.\r\n\r\nTypes of Kidney Failure\r\n1. Acute Kidney Failure: A sudden loss of kidney function, often caused by severe injury, infection, or dehydration.\r\n2. Chronic Kidney Disease (CKD): Gradual loss of kidney function over time, often due to conditions like diabetes or hypertension.\r\n\r\nCommon Causes\r\n. Diabetes: High blood sugar levels damage kidney tissues.\r\n. Hypertension: High blood pressure stresses the kidneys.\r\n. Infections: Severe or recurring infections can harm kidney function.\r\n. Toxins: Prolonged use of certain medications or exposure to toxins. \r\n. Kidney Stones: Persistent obstructions can lead to damage.\r\n\r\nSymptoms\r\n. Fatigue and weakness\r\n. Swelling in the legs, feet, or ankles (edema)\r\n. Reduced urine output\r\n. Shortness of breath\r\n. Nausea or vomiting\r\n. Persistent itching\r\n\r\nPrevention Tips\r\n1. Control Blood Pressure and Diabetes: Regularly monitor and manage these conditions.\r\n2. Stay Hydrated: Drink adequate water to support kidney health.\r\n3. Avoid Excess Salt: Reduce sodium intake in your diet.\r\n4. Limit Alcohol and Smoking: Both can contribute to kidney damage.\r\n5. Regular Checkups: Early detection of kidney issues improves outcomes.\r\n\r\nConclusion\r\nKidney failure is a serious condition but can often be prevented or managed with a healthy lifestyle and early medical intervention. Protect your kidneys—they play a vital role in maintaining overall health.', '6746278a8f268-kidney_blog.jpg', 'Dr. Muhammad Shafique', 'published', '2024-11-26 19:54:50'),
(41, 'Understanding Cancer: Types, Causes, Symptoms, and Prevention', 'Cancer is a group of diseases characterized by the uncontrolled growth and spread of abnormal cells in the body. If untreated, it can invade surrounding tissues and organs, potentially leading to life-threatening complications.\r\n\r\nTypes of Cancer\r\nCancer can affect nearly any part of the body. Common types include:\r\n1. Lung Cancer: Often linked to smoking or exposure to pollutants.\r\n2. Breast Cancer: Frequently affects women, but men can develop it too.\r\n3. Prostate Cancer: A common cancer in men, affecting the prostate gland.\r\n4. Skin Cancer: Caused by prolonged exposure to UV rays.\r\n5. Colon and Rectal Cancer (Colorectal Cancer): Associated with dietary habits and genetics.\r\n6. Leukemia: A cancer of blood-forming tissues, including the bone marrow.\r\n\r\nCauses\r\n. Cancer is caused by mutations in the DNA of cells. These mutations can result from:\r\n. Lifestyle Factors: Smoking, excessive alcohol consumption, poor diet, lack of exercise.\r\n. Environmental Factors: Exposure to harmful chemicals, radiation, and pollutants.\r\n. Genetics: Family history of certain types of cancer.\r\n. Infections: Certain viruses (e.g., HPV, Hepatitis B and C) are linked to cancer.\r\n\r\nCommon Symptoms\r\nThe symptoms of cancer vary depending on its type and stage but may include:\r\n. Unexplained weight loss\r\n. Persistent fatigue\r\n. Unusual lumps or swelling\r\n. Changes in the skin (e.g., new moles or changes in existing ones)\r\n. Chronic pain\r\n. Persistent cough or difficulty swallowing\r\n. Abnormal bleeding or discharge\r\nIf you notice persistent or unusual symptoms, consult a healthcare professional promptly.\r\n\r\nPrevention Tips\r\n1. Avoid Tobacco: Smoking and tobacco use are major cancer risk factors.\r\n2. Healthy Diet: Eat plenty of fruits, vegetables, and whole grains; limit processed foods and red meats.\r\n3. Stay Physically Active: Regular exercise helps maintain a healthy weight and reduces cancer risk.\r\n4. Protect Your Skin: Use sunscreen and avoid excessive sun exposure to prevent skin cancer.\r\n5. Get Vaccinated: Vaccines like HPV and Hepatitis B can reduce cancer risk.\r\n6. Limit Alcohol: Excessive alcohol consumption increases cancer risk.\r\n7. Regular Screenings: Early detection through screenings (e.g., mammograms, colonoscopies) can save lives.\r\n\r\nTreatment Options\r\n. Cancer treatment depends on the type and stage of the disease. Common approaches include:\r\n. Surgery: Removing the tumor or affected tissue.\r\n. Radiation Therapy: Using high-energy rays to kill cancer cells.\r\n. Chemotherapy: Using drugs to target and destroy cancer cells.\r\n. Immunotherapy: Boosting the immune system to fight cancer.\r\n. Targeted Therapy: Drugs that target specific cancer cell genes or proteins.\r\n\r\nConclusion\r\nCancer is a serious disease, but advances in medical science have improved early detection, treatment, and survival rates. A healthy lifestyle, regular checkups, and awareness of risk factors can go a long way in preventing and managing cancer.', '674627e4d5967-cancer_blog.jpg', 'Dr. Hassan Ali', 'published', '2024-11-26 19:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(2, 'Lahore'),
(3, 'Islamabad '),
(9, 'Multan');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_add`
--

CREATE TABLE `doctor_add` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_email` varchar(100) NOT NULL,
  `doctor_phone` varchar(15) NOT NULL,
  `doctor_days` varchar(100) DEFAULT NULL,
  `timing` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `city` int(11) DEFAULT NULL,
  `specialization_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor_add`
--

INSERT INTO `doctor_add` (`id`, `doctor_name`, `doctor_email`, `doctor_phone`, `doctor_days`, `timing`, `password`, `file_name`, `status`, `created_at`, `city`, `specialization_id`) VALUES
(28, 'doctor', 'doctor@gmail.com', '2566523233', 'monday to sunday', '9 to 5', '$2y$10$oSPoRbUVesYCB15OJEJt8.SjEQwyOOiK8tubVo950DnSbZNtsYGOK', 'image/Screenshot 2023-06-29 025448.png', 'approved', '2024-11-17 11:09:34', 2, 3),
(30, 'doctor2', 'doctor2@gmail.com', '226537562', 'MWF', '7 am to 12 pm', '$2y$10$6MyPWfPBES4b6WdkE9DwN.s6nnYGRTpZS.2ikmdYtjnXfJgektff2', 'image/p2.png', 'approved', '2024-11-17 11:33:47', 2, 3),
(31, 'doctor3', 'doctor3@gmail.com', '7546328', 'MWF', '8 am to 8 pm', '$2y$10$y.YcZOue5D0uVt/A9ichl./ZtnD05Pc2p9eV18z43HqebketLueF6', 'image/sc2.png', 'rejected', '2024-11-18 09:50:29', 9, 1),
(34, 'maha', 'maha@gmail.com', '15245412121', 'Mon-Fri', '7 to 11', '$2y$10$uoA1JU5zo9ohqh0nSuZQG.KkMeOE39lFaLSKArt3qcJXtw.I7wTzK', 'image/about-footer-img.jpg', 'approved', '2024-11-27 18:11:38', 2, 3),
(35, 'Dr Hassan Ali', 'hassanali@gmail.com', '03158745756', 'Mon-Fri', '6 to 9', '$2y$10$B5jfetdVer1MU//0.xWhsuV0bgHpqcybvrJttScjTbrFcnqbJxi9W', 'image/author-3.jpg', 'approved', '2024-11-27 18:24:34', 9, 5),
(36, 'Dr. Muhammad Shafique', 'muhammadshafique@gmail.com', '03058871258', 'Mon - Wed', '7 to 11', '$2y$10$4Vu2oVSnSWcfkDKutJ81P.hEatGh9DbmqiHymRwZ2O5jjfKJyytMG', 'image/author-4.jpg', 'approved', '2024-11-27 18:27:17', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_patient_appointments`
--

CREATE TABLE `doc_patient_appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `status_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doc_patient_appointments`
--

INSERT INTO `doc_patient_appointments` (`id`, `patient_id`, `doctor_id`, `appointment_date`, `appointment_time`, `status`, `status_message`) VALUES
(34, 12, 28, '2022-09-15', '03:40:00', 'rejected', NULL),
(35, 12, 28, '2022-10-15', '03:51:00', 'approved', NULL),
(36, 12, 30, '2022-09-15', '02:50:00', 'pending', NULL),
(37, 12, 30, '2023-10-15', '03:51:00', 'rejected', NULL),
(38, 12, 30, '2023-10-16', '03:55:00', 'rejected', NULL),
(39, 12, 30, '2023-10-16', '03:58:00', 'approved', NULL),
(40, 12, 28, '2023-10-16', '04:20:00', 'pending', NULL),
(41, 12, 30, '2020-10-16', '03:20:00', 'approved', NULL),
(42, 12, 28, '2023-10-17', '03:14:00', 'rejected', NULL),
(43, 12, 28, '2324-02-02', '05:05:00', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_reg`
--

CREATE TABLE `patient_reg` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `patient_age` int(50) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `patient_phone` varchar(50) NOT NULL,
  `patient_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_reg`
--

INSERT INTO `patient_reg` (`id`, `patient_name`, `patient_age`, `patient_email`, `patient_phone`, `patient_password`) VALUES
(12, 'Maha Zehra', 20, 'maha@gmail.com', '03258741384', 'patient'),
(18, 'saba Khan', 25, 'sabakhan@gmail.com', '0312 545421748', 'saba123'),
(19, 'M Hamza', 38, 'hamza@gmail.com', '0306 121754212', 'hamza123'),
(20, 'Bushra', 15, 'bushra@gmail.com', '0311 4789521', '$2y$10$wy8yh1AONvk999u6ftv3nuINL2snNoUfBZrFEftYcoqhwia/F2WqO');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `name`, `email`, `password`) VALUES
(7, 'znb ali', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`sp_id`, `sp_name`) VALUES
(1, 'Surgeon '),
(3, 'Neurosurgeon '),
(4, 'Dentist'),
(5, 'cardiologist ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `doctor_add`
--
ALTER TABLE `doctor_add`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_email` (`doctor_email`),
  ADD KEY `specialization_id` (`specialization_id`);

--
-- Indexes for table `doc_patient_appointments`
--
ALTER TABLE `doc_patient_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doc_patient_appointments_ibfk_2` (`doctor_id`);

--
-- Indexes for table `patient_reg`
--
ALTER TABLE `patient_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor_add`
--
ALTER TABLE `doctor_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `doc_patient_appointments`
--
ALTER TABLE `doc_patient_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `patient_reg`
--
ALTER TABLE `patient_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_add`
--
ALTER TABLE `doctor_add`
  ADD CONSTRAINT `doctor_add_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`sp_id`);

--
-- Constraints for table `doc_patient_appointments`
--
ALTER TABLE `doc_patient_appointments`
  ADD CONSTRAINT `doc_patient_appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_reg` (`id`),
  ADD CONSTRAINT `doc_patient_appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor_add` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
