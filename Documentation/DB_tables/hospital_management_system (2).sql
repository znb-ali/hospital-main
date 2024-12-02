-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 07:53 PM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `contacted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phone`, `date`, `message`, `created_at`, `contacted`) VALUES
(7, 'ali', 'ali@gmail.com', '032871165657', '2025-02-01', 'I hope this message finds you well. I would like to schedule an appointment with you at your earliest convenience for [brief reason for the visit, e.g., a general check-up, consultation about specific symptoms, or a follow-up on previous treatments].\r\nPlease let me know your availability so that we can find a suitable time. I am flexible and can adjust my schedule as needed.\r\nThank you for your time and assistance.\r\nBest regards, ', '2024-12-01 17:03:18', 1);

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
(41, 'Understanding Cancer: Types, Causes, Symptoms, and Prevention', 'Cancer is a group of diseases characterized by the uncontrolled growth and spread of abnormal cells in the body. If untreated, it can invade surrounding tissues and organs, potentially leading to life-threatening complications.\r\n\r\nTypes of Cancer\r\nCancer can affect nearly any part of the body. Common types include:\r\n1. Lung Cancer: Often linked to smoking or exposure to pollutants.\r\n2. Breast Cancer: Frequently affects women, but men can develop it too.\r\n3. Prostate Cancer: A common cancer in men, affecting the prostate gland.\r\n4. Skin Cancer: Caused by prolonged exposure to UV rays.\r\n5. Colon and Rectal Cancer (Colorectal Cancer): Associated with dietary habits and genetics.\r\n6. Leukemia: A cancer of blood-forming tissues, including the bone marrow.\r\n\r\nCauses\r\n. Cancer is caused by mutations in the DNA of cells. These mutations can result from:\r\n. Lifestyle Factors: Smoking, excessive alcohol consumption, poor diet, lack of exercise.\r\n. Environmental Factors: Exposure to harmful chemicals, radiation, and pollutants.\r\n. Genetics: Family history of certain types of cancer.\r\n. Infections: Certain viruses (e.g., HPV, Hepatitis B and C) are linked to cancer.\r\n\r\nCommon Symptoms\r\nThe symptoms of cancer vary depending on its type and stage but may include:\r\n. Unexplained weight loss\r\n. Persistent fatigue\r\n. Unusual lumps or swelling\r\n. Changes in the skin (e.g., new moles or changes in existing ones)\r\n. Chronic pain\r\n. Persistent cough or difficulty swallowing\r\n. Abnormal bleeding or discharge\r\nIf you notice persistent or unusual symptoms, consult a healthcare professional promptly.\r\n\r\nPrevention Tips\r\n1. Avoid Tobacco: Smoking and tobacco use are major cancer risk factors.\r\n2. Healthy Diet: Eat plenty of fruits, vegetables, and whole grains; limit processed foods and red meats.\r\n3. Stay Physically Active: Regular exercise helps maintain a healthy weight and reduces cancer risk.\r\n4. Protect Your Skin: Use sunscreen and avoid excessive sun exposure to prevent skin cancer.\r\n5. Get Vaccinated: Vaccines like HPV and Hepatitis B can reduce cancer risk.\r\n6. Limit Alcohol: Excessive alcohol consumption increases cancer risk.\r\n7. Regular Screenings: Early detection through screenings (e.g., mammograms, colonoscopies) can save lives.\r\n\r\nTreatment Options\r\n. Cancer treatment depends on the type and stage of the disease. Common approaches include:\r\n. Surgery: Removing the tumor or affected tissue.\r\n. Radiation Therapy: Using high-energy rays to kill cancer cells.\r\n. Chemotherapy: Using drugs to target and destroy cancer cells.\r\n. Immunotherapy: Boosting the immune system to fight cancer.\r\n. Targeted Therapy: Drugs that target specific cancer cell genes or proteins.\r\n\r\nConclusion\r\nCancer is a serious disease, but advances in medical science have improved early detection, treatment, and survival rates. A healthy lifestyle, regular checkups, and awareness of risk factors can go a long way in preventing and managing cancer.', '674627e4d5967-cancer_blog.jpg', 'Dr. Hassan Ali', 'published', '2024-11-26 19:56:20'),
(45, ' Autism Spectrum Disorder (ASD): Understanding the Condition', 'Autism Spectrum Disorder (ASD) is a developmental disorder that affects a person\'s ability to communicate, interact socially, and engage in repetitive behaviors. It\'s considered a \"spectrum\" because it encompasses a wide range of symptoms and severity levels, meaning no two individuals with autism are alike.\r\n\r\nSigns and Symptoms of Autism\r\nAutism\'s symptoms typically appear in early childhood, often before the age of 3, and can include:\r\n\r\nSocial Communication Challenges\r\n\r\nDifficulty understanding or interpreting social cues such as body language, tone of voice, or facial expressions.\r\nLimited ability to start or maintain conversations.\r\nDifficulty making eye contact or showing interest in social interactions.\r\nRepetitive Behaviors\r\n\r\nEngaging in repetitive movements (e.g., hand-flapping, rocking).\r\nInsistence on sameness, routines, or rituals (e.g., eating the same foods every day, lining up toys).\r\nIntense focus on specific topics or interests, sometimes to the exclusion of everything else.\r\nSensory Sensitivities\r\n\r\nOver- or under-sensitivity to sensory stimuli like light, sound, textures, or smells.\r\nDifficulty tolerating certain fabrics, loud noises, or bright lights.\r\nDelayed Developmental Milestones\r\n\r\nDelayed speech or language development.\r\nChallenges with motor coordination and fine motor skills.\r\nUnusual or Intense Interests\r\n\r\nStrong focus on particular activities or objects, often to the point of obsession.\r\nCauses of Autism\r\nThe exact cause of autism is still not fully understood, but researchers believe it involves a combination of genetic and environmental factors:\r\n\r\nGenetic Factors: Certain genes may increase the risk of autism. It tends to run in families, suggesting a genetic predisposition.\r\nEnvironmental Factors: Some studies suggest that factors like prenatal exposure to certain chemicals, maternal infections, or complications during birth may increase the likelihood of autism, though these factors alone do not cause the condition.\r\nDiagnosis\r\nDiagnosing autism typically involves a comprehensive evaluation by a team of specialists, including:\r\n\r\nPediatricians or Family Doctors: Initial screenings to identify early signs of autism.\r\nDevelopmental Psychologists: Assessment of cognitive and behavioral development.\r\nSpeech and Language Therapists: Evaluating communication abilities.\r\nPsychiatrists or Psychologists: Diagnosing associated conditions such as anxiety or ADHD that often co-occur with autism.\r\nEarly diagnosis is key to providing appropriate interventions that can help improve the quality of life for children with autism.\r\n\r\nTreatment and Interventions\r\nWhile there is no cure for autism, a variety of interventions and therapies can help individuals with ASD lead fulfilling lives:\r\n\r\nBehavioral Therapy\r\n\r\nApplied Behavior Analysis (ABA): A well-known therapeutic approach that encourages positive behaviors and discourages harmful or disruptive ones.\r\nEarly Intervention Programs: Intensive therapies during early childhood can significantly improve outcomes in terms of communication and social skills.\r\nSpeech and Language Therapy\r\n\r\nHelps individuals improve communication skills, whether verbal or non-verbal, and develop social language skills.\r\nOccupational Therapy\r\n\r\nHelps individuals develop daily living skills, like dressing, feeding, and other self-care activities, as well as coping with sensory sensitivities.\r\nSocial Skills Training\r\n\r\nHelps individuals learn how to interact with others, understand social cues, and build relationships.\r\nMedication\r\n\r\nWhile there is no medication specifically for autism, medications may be prescribed to manage symptoms like anxiety, depression, or ADHD, which often co-occur with autism.\r\nSpecial Education Programs\r\n\r\nMany children with autism benefit from tailored educational programs that focus on their specific learning needs, whether in mainstream schools with support or in specialized schools.\r\nFamily Support and Counseling\r\n\r\nFamilies may benefit from counseling, support groups, or parent training to help manage the challenges of raising a child with autism.\r\nLiving with Autism\r\nAutism is a lifelong condition, but many individuals with ASD lead successful and independent lives with the right support and interventions. The key to success is early intervention, a personalized approach to treatment, and a supportive environment.\r\n\r\nAutism Spectrum and Individual Differences\r\nSince autism is a spectrum, the needs and challenges of individuals can vary greatly. Some individuals with autism may be highly intelligent and independent, while others may require ongoing support throughout their lives. Early interventions, community resources, and societal understanding can go a long way in ensuring that individuals with autism have the tools they need to succeed.\r\n', '674a36d9dcbb0-autisam_blog2.jpg', 'Dr. Zameer Jaffri', 'published', '2024-11-29 21:49:13'),
(46, 'Understanding Brain Disorders: What You Need to Know', 'Brain disorders can affect anyone, at any age, and in various ways. These disorders can range from temporary issues like headaches to more serious conditions like Alzheimer’s disease or stroke. Understanding the different types of brain disorders is key to recognizing symptoms early and seeking proper treatment.\r\n\r\nWhat Are Brain Disorders?\r\nBrain disorders refer to conditions that affect the structure or function of the brain, impacting a person’s ability to think, move, or feel in normal ways. These disorders can be neurological, affecting the nervous system, or psychiatric, linked to mental health. Some conditions are genetic, while others are caused by injury, infection, or the natural aging process.\r\n\r\nCommon Brain Disorders\r\nAlzheimer\'s Disease\r\nAlzheimer\'s is a neurodegenerative condition that primarily affects memory and cognitive abilities. Early signs include forgetfulness, confusion, and difficulty with daily tasks. While there\'s no cure, early diagnosis can help manage symptoms and improve quality of life.\r\n\r\nParkinson\'s Disease\r\nParkinson’s disease affects movement and can lead to tremors, stiffness, and difficulty with coordination. It results from the gradual loss of dopamine-producing brain cells. Medications and therapy can help manage symptoms.\r\n\r\nStroke\r\nA stroke occurs when there is a blockage or rupture of a blood vessel in the brain, leading to a lack of oxygen. Symptoms include sudden numbness, weakness, confusion, or difficulty speaking. Immediate medical attention is crucial for recovery.\r\n\r\nEpilepsy\r\nEpilepsy is a neurological condition characterized by recurrent seizures caused by abnormal electrical activity in the brain. Seizures can vary in severity, and treatment often involves medication to control the episodes.\r\n\r\nMigraines\r\nMigraines are severe, often debilitating headaches accompanied by nausea, light sensitivity, and sometimes visual disturbances. Triggers can include stress, certain foods, or hormonal changes, and they can be managed with lifestyle changes and medications.\r\n\r\nThe Importance of Early Diagnosis\r\nEarly detection of brain disorders is crucial to managing symptoms and preventing further complications. If you or a loved one experience persistent changes in memory, mood, or movement, it’s important to consult with a healthcare professional.\r\n\r\nLiving with a Brain Disorder\r\nManaging a brain disorder often requires a multi-faceted approach, including medication, therapy, lifestyle adjustments, and support. With the right care, people living with brain disorders can lead fulfilling lives.\r\n\r\nBrain health is essential, and staying informed about the signs and symptoms of common disorders can help you take proactive steps toward treatment and management.\r\n', '674a37dbb62c0-blog_brain.jpg', 'Dr. Sania Hassan', 'published', '2024-11-29 21:53:31');

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
(9, 'Multan'),
(12, 'Karachi');

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
(35, 'Dr Hassan Ali', 'dr.hassan@gmail.com', '03158745756', 'Mon-Fri', '6:00 to 9:00', '$2y$10$B5jfetdVer1MU//0.xWhsuV0bgHpqcybvrJttScjTbrFcnqbJxi9W', 'image/author-3.jpg', 'approved', '2024-11-27 18:24:34', 9, 3),
(42, 'Dr. Tahira Meer', 'dr.tahira@gmail.com', '03159631554', 'Mon-Fri', '4:00 to 6:00', '$2y$10$YW1OJl5b9jjjCCmKLk4ymugTo0MJtB0WeCaRvSoQ1jqB/EVat85MS', 'image/team-6.jpg', 'approved', '2024-11-29 21:00:05', 3, 4),
(43, 'Dr. Imran Mehmood', 'dr.imran@gmail.com', '03458521556', 'Thursday - Friday ', '6:00 to 9:00', '$2y$10$ep3hIaauedZB6BghQZeKGOesE6Ccu1Z7T6TdeaA5gwpwfAwOD7eym', 'image/team-2.jpg', 'approved', '2024-11-29 21:02:47', 12, 5),
(44, 'Dr. Nazia Shakeel', 'dr.nazia@gmail.com', '03318845677', 'Mon-Fri', '8:00 to 10:00', '$2y$10$0sgNdjEZts0g.gkDgoZKeuO4Vrfx6WXW9lvrhOQcN31jaz4xKZ4yu', 'image/team-8.jpg', 'approved', '2024-11-29 21:12:57', 2, 6),
(46, 'Dr. Tariq Muhammad', 'dr.tariq@gmail.com', '032198574621', 'Mon - Wed', '5:00 to 8:00', '$2y$10$GJCi70xb8nWjxFVByAIageTfy5uGApAqsfIC4tPaGnZmyp9POkk5y', 'image/doc-new2.jpg', 'approved', '2024-12-01 16:25:42', 12, 3),
(48, 'Dr. Muhammad Shafique', 'dr.muhammad@gmail.com', '03128754225', 'Mon - Wed', '7:00 to 11:00', '$2y$10$gG2GGBv/LkaDl4tWsOLUM.5QOEBEKh29ZeePo7JP3JV0cMClUuaQ2', 'image/male-newdoc.jpg', 'approved', '2024-12-01 20:08:52', 12, 1),
(50, 'Dr. Hina Yousuf', 'dr.hina@gmail.com', '03128524789', 'Mon - Wed', '8:00 to 10:00', '$2y$10$gvVMOT81pVexi/4KYIKDVewyjWLmoX1lA/qCWgi3tOOJH2PJ/oBea', 'image/female_newdoc.jpg', 'approved', '2024-12-01 20:23:54', 9, 4),
(52, 'Dr. Abdul Malik', 'dr.abdulmalik@gmail.com', '0306778549', 'Thursday - Friday ', '7:00 to 11:00', '$2y$10$M5yvUpraHo6ZwIXRbHRI4.cSwMBnZF29C8EVTonDLjv6cXp1JmF3K', 'image/doc-m.jpg', 'approved', '2024-12-01 20:30:25', 3, 5),
(54, 'Dr Maria Abid', 'dr.maria@gmail.com', '0311852479', 'Mon-Fri', '8:00 to 10:00', '$2y$10$Ot2dXLUM09JqrMFYl4IszuPRmyw60TeHDpq6cOBHr70tNh5sLiIky', 'image/female_enddoc.jpg', 'approved', '2024-12-01 20:57:32', 9, 6),
(56, 'Dr.Dania Amir', 'dr.dania@gmail.com', '0321875487', 'Mon-Fri', '6:00 to 9:00', '$2y$10$dOlOA55e4jZcOoXIfI2nH.6klXuEnZguM8.pj4ijY6dM2PgZDMrTK', 'image/Female1.jpg', 'approved', '2024-12-02 17:38:07', 3, 1),
(57, 'Dr. Majid Hussain', 'dr.majid@gmail.com', '03218547963', 'Thursday - Friday', '7:00 to 11:00', '$2y$10$XgBaOKQBu0J6ei5TbHkB6eGzGtfVU8Ts4K4lZnIogPKV3vRi4sczm', 'image/male1.jpg', 'approved', '2024-12-02 17:40:22', 12, 4),
(58, 'Dr. Shahina Alvi', 'dr.shahina@gmail.com', '03058989741', 'Mon-Fri', '8:00 to 10:00', '$2y$10$M5tec5w1KyffGqDJi8qBf.aYE/i46yiDODG6BK9GQkKZiAbkeD3ny', 'image/female2.jpg', 'approved', '2024-12-02 17:42:14', 2, 6);

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
(44, 12, 35, '2025-10-01', '19:00:00', 'rejected', NULL),
(45, 12, 42, '2025-12-02', '16:30:00', 'approved', NULL),
(46, 12, 42, '2024-10-12', '17:00:00', 'rejected', NULL),
(47, 12, 43, '2025-12-02', '18:30:00', 'pending', NULL),
(48, 12, 44, '2025-06-02', '20:00:00', 'approved', NULL),
(49, 12, 46, '2025-09-01', '18:00:00', 'rejected', NULL),
(52, 12, 48, '2025-02-20', '19:00:00', 'rejected', NULL),
(54, 12, 52, '2025-01-25', '19:30:00', 'approved', NULL),
(56, 12, 54, '2025-03-02', '20:00:00', 'approved', NULL),
(58, 19, 35, '2025-02-05', '18:30:00', 'approved', NULL),
(59, 19, 42, '2025-02-06', '16:30:00', 'approved', NULL),
(60, 19, 43, '2024-12-29', '18:00:00', 'approved', NULL),
(61, 19, 44, '2025-02-09', '20:00:00', 'approved', NULL),
(62, 12, 35, '2025-04-05', '18:00:00', 'pending', NULL),
(63, 12, 42, '2025-03-25', '16:30:00', 'pending', NULL),
(64, 12, 43, '2025-04-16', '18:30:00', 'rejected', NULL),
(65, 12, 44, '2025-03-04', '20:00:00', 'pending', NULL),
(66, 12, 46, '2025-03-01', '17:00:00', 'approved', NULL),
(68, 12, 48, '2025-04-06', '20:00:00', 'approved', NULL),
(69, 12, 50, '2025-03-19', '20:00:00', 'pending', NULL),
(70, 12, 52, '2025-04-05', '19:30:00', 'approved', NULL),
(71, 12, 58, '2025-04-12', '20:00:00', 'pending', NULL),
(72, 12, 57, '2025-03-27', '19:30:00', 'approved', NULL),
(73, 12, 56, '2025-04-08', '18:30:00', 'pending', NULL),
(74, 12, 43, '2025-03-14', '18:10:00', 'approved', NULL),
(75, 19, 46, '2025-03-10', '17:00:00', 'pending', NULL),
(76, 19, 48, '2025-04-01', '19:00:00', 'pending', NULL),
(77, 19, 50, '2025-01-15', '20:00:00', 'approved', NULL),
(78, 19, 52, '2025-04-05', '19:30:00', 'pending', NULL),
(79, 19, 54, '2025-05-02', '20:30:00', 'pending', NULL),
(80, 19, 56, '2025-04-17', '18:00:00', 'rejected', NULL),
(81, 19, 57, '2025-05-07', '19:30:00', 'pending', NULL),
(82, 19, 58, '2025-04-20', '20:00:00', 'rejected', NULL),
(83, 19, 42, '2025-05-06', '16:00:00', 'pending', NULL),
(84, 19, 44, '2025-05-20', '20:20:00', 'rejected', NULL),
(85, 19, 48, '2025-04-22', '19:30:00', 'approved', NULL),
(86, 19, 52, '2025-04-09', '19:45:00', 'rejected', NULL),
(87, 19, 56, '2024-03-23', '18:20:00', 'approved', NULL),
(88, 19, 58, '2025-02-25', '20:00:00', 'approved', NULL);

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
(12, 'Maha Zehra', 20, 'maha@gmail.com', '0312-8741384', 'patient'),
(19, 'M Hamza', 30, 'hamza@gmail.com', '0306 121754212', 'hamza123');

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
(1, 'Endocrinologists '),
(3, 'Neurologists'),
(4, 'Pathologists'),
(5, 'Cardiologist '),
(6, 'Pediatricians ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor_add`
--
ALTER TABLE `doctor_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `doc_patient_appointments`
--
ALTER TABLE `doc_patient_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

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
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
