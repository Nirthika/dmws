SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'no',
  `userType` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `userType`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'T Kumanan', 'mtkumanan@yahoo.com', '$2y$12$ybpe2QK87LagtZHquUDcvuZMNBtwWBpGKxYIA7Ts34P6gV34baily', 'yes', 'Doctor', 'default.jpg', '', '', ''),
(2, 'S Ghetheeswaran', 'ghethees@gmail.com', '$2y$12$7RD1ZpFg/knWsLjFp2KDR.8iWKCVnk5b8PTm/06GvfT6h/vatdGfu', 'no', 'Doctor', 'default.jpg', '', '', ''),
(3, 'A Raveendran', 'raveen@gmail.com', '$2y$12$r8rreG5eEgn0vKTdQVIMxOni0IrgX8WszYtOV/CDfPYZQBIzAgykS', 'yes', 'MOH', 'default.jpg', '', '', ''),
(4, 'S Balendran', 'balen@gmail.com', '$2y$12$dYmkxG.mARGnWjyy8vSyyO6eug3tCq7eEe.YtRYKwfxlbiNqueitC', 'no', 'MOH', 'default.jpg', '', '', ''),
(5, 'U Indrajith', 'indrajith@gmail.com', '$2y$12$lML42/xB9v1ELsYa.9JnbOk/wxxM5vep/pls2YRkrYNW2usrv82QW', 'yes', 'PHI', 'default.jpg', '', '', ''),
(7, 'G Haran', 'haran@gmail.com', '$2y$12$3fnMD9/k4s9p1AmfHxRZvuMTTF6q.kU5CSrIcPjMXRFoyxlWC8JX.', 'no', 'PHI', 'default.jpg', '', '', ''),
(8, 'M Naven', 'naven@gmail.com', '$2y$12$9bCKxO3Kh1fR00jBQTxEK.NM5UwFAwnpKCZtNO.ROt3Bais48IW8e', 'yes', 'RDHS', 'default.jpg', '', '', ''),
(9, 'J Suren', 'suren@gmail.com', '$2y$12$yVweuA4ocGzMxg3nfF2jgOuYOL2IGPRPnp6YqHP07ph13LtIO4pPu', 'no', 'RDHS', 'default.jpg', '', '', ''),
(10, 'R Pavan', 'pavan@gmail.com', '$2y$12$p7DylnJuDrxsSy4M2/7qbuObIxRJY7gbgCA3Ya0sgYZNablASXXn2', 'yes', 'EU', 'default.jpg', '', '', ''),
(11, 'V Sri', 'sri@gmail.com', '$2y$12$yzlEK1Dv9apR1wVvEBj/7OQOYfdhP0v/cK7WcYGBNlFxjBhvpTXFi', 'no', 'EU', 'default.jpg', '', '', ''),
(12, 'T Peranantharajah', 'peranantharajah@gmail.com', '$2y$12$oV775socXzmOJ3b5r0L8feSS2dmKkQOZfJSNElt3QxQBGWobU1yCa', 'yes', 'Doctor', 'default.jpg', '', '', ''),
(13, 'S Sivansuthan', 'suthan@gmail.com', '$2y$12$SLgdtrEQbMjnn4fDKoQ9LeqM93hjuq8HdF/KFMhM8wbUcP.Tq4KSC', 'no', 'Doctor', 'default.jpg', '', '', '');

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

CREATE TABLE `institutes` (
  `insName` varchar(35) NOT NULL,
  `insType` text NOT NULL,
  `addLine1` text NOT NULL,
  `addLine2` text,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `gsDiv` text NOT NULL,
  `mohArea` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`insName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `institutes` (`insName`, `insType`, `addLine1`, `addLine2`, `province`, `district`, `gsDiv`, `mohArea`) VALUES
('Care and Cure', 'Private', '', NULL, '', '', '', ''),
('Dental Surgery', 'Private', '', NULL, '', '', '', ''),
('Divisional Hospital', 'Private', '', NULL, '', '', '', ''),
('Jaffna Teaching Hospital', 'Government', 'aaaaa', 'qqqqqq', 'rrrrr', 'dddddd', 'sed234', 'ghjiuu'),
('Life Care Medi Cilinic', 'Private', '', NULL, '', '', '', ''),
('Mangalapathy Siddha Ayurvedic', 'Private', '', NULL, '', '', '', ''),
('Modern New Medi Care Hospital', 'Private', '', NULL, '', '', '', ''),
('Nagaa Medical Centre', 'Private', '', NULL, '', '', '', ''),
('New Yarl Hospital', 'Private', '', NULL, '', '', '', ''),
('Northern Central Hospitals', 'Private\r\n', '', NULL, '', '', '', ''),
('Pillaiyar Medi Clinic', 'Private', '', NULL, '', '', '', ''),
('Rakavo Hospital', 'Private', '', NULL, '', '', '', ''),
('Renny Dental and Optical Service', 'Private', '', NULL, '', '', '', ''),
('Royal Medical Centre', 'Private', '', NULL, '', '', '', ''),
('Ruhlins Hospital', 'Private', '', NULL, '', '', '', ''),
('Sampanthar Modern Clinic', 'Private', '', NULL, '', '', '', ''),
('Shan''s Health Care', 'Private', '', NULL, '', '', '', ''),
('Shanthe Medi Clinic', 'Private', '', NULL, '', '', '', ''),
('Suharni Hospital', 'Private', '', NULL, '', '', '', ''),
('Sujeeva Hospital', 'Private', '', NULL, '', '', '', ''),
('Sunrise Medi Clinic', 'Private', '', NULL, '', '', '', '');

CREATE TABLE `doctors` (
  `userId` int(10) UNSIGNED NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `gender` text NOT NULL,
  `doctorRegNo` varchar(8) NOT NULL,
  `designation` text NOT NULL,
  `addLine1` text NOT NULL,
  `addLine2` text,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `contactNoOffice` text NOT NULL,
  `contactNoMobile` text NOT NULL,
  `hospital1` text NOT NULL,
  `hospital2` text,
  `hospital3` text,
  `hospital4` text,
  `hospital5` text,
  `otherHospital` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`doctorRegNo`),
  CONSTRAINT doctor_user_id FOREIGN KEY (userId) REFERENCES users(id) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `doctors` (`userId`, `firstName`, `lastName`, `gender`, `doctorRegNo`, `designation`, `addLine1`, `addLine2`, `province`, `district`, `contactNoOffice`, `contactNoMobile`, `hospital1`, `hospital2`, `hospital3`, `hospital4`, `hospital5`, `otherHospital`) VALUES
(1, 'Thirunavukarasu', 'Kumanan', 'Male', 'JDR101', 'Consultant Physician', '127/7 A', 'Temple Rd', 'Northern', 'Jaffna', ' 0212228129', '', 'Jaffna Teaching Hospital', 'Northern Central Hospitals', '', '', '', ''),
(12, 'T', 'Peranantharajah', 'Male', 'JDR102', 'Physician', '12 A', 'Palai Rd', 'Northern', 'Jaffna', '', '077 111 1111', 'Jaffna Teaching Hospital', 'Suharni Hospital', '', '', '', '');

CREATE TABLE `eUs` (
  `userId` int(10) UNSIGNED NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `gender` text NOT NULL,
  `eUDiv` varchar(8) NOT NULL,
  `addLine1` text NOT NULL,
  `addLine2` text,
  `district` text NOT NULL,
  `province` text NOT NULL,
  `contactNoOffice` text NOT NULL,
  `contactNoMobile` text NOT NULL,
  `insName` varchar(35) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL, 
  PRIMARY KEY (`eUDiv`),
  CONSTRAINT eu_user_id FOREIGN KEY (userId) REFERENCES users(id) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eUs` (`userId`, `firstName`, `lastName`, `gender`, `eUDiv`, `addLine1`, `addLine2`, `district`, `province`, `contactNoOffice`, `contactNoMobile`, `insName`, `created_at`, `updated_at`) VALUES
(10, 'Ram', 'Pavan', 'Male', 'JEU101', '45, Palam Rd', 'Kandarmadam', 'Jaffna', 'Northern', '', '0777161561', 'Jaffna Teaching Hospital', '', '');

CREATE TABLE `mOHs` (
  `userId` int(10) UNSIGNED NOT NULL,
  `insName` varchar(35) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `gender` text NOT NULL,
  `mOHRegNo` varchar(8) NOT NULL,
  `mOHArea` text NOT NULL,
  `addLine1` text NOT NULL,
  `addLine2` text,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `contactNoOffice` text NOT NULL,
  `contactNoMobile` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mOHRegNo`),
  CONSTRAINT moh_user_id FOREIGN KEY (userId) REFERENCES users(id) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mOHs` (`userId`, `insName`, `firstName`, `lastName`, `gender`, `mOHRegNo`, `mOHArea`, `addLine1`, `addLine2`, `province`, `district`, `contactNoOffice`, `contactNoMobile`) VALUES
(3, 'Jaffna Teaching Hospital', 'Aravinthan',  'Raveenran', 'Male', 'JMOH101', 'Jaffna', '17/8', 'Brown Rd', 'Northern', 'Jaffna', '0212342346', '');

CREATE TABLE `pHIs` (
  `userId` int(10) UNSIGNED NOT NULL,
  `insName` varchar(35) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `gender` text NOT NULL,
  `pHIRegNo` varchar(8) NOT NULL,
  `pHIRange` text NOT NULL,
  `addLine1` text NOT NULL,
  `addLine2` text,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `contactNoOffice` text NOT NULL,
  `contactNoMobile` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pHIRegNo`),
  CONSTRAINT phi_user_id FOREIGN KEY (userId) REFERENCES users(id) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pHIs` (`userId`, `insName`, `firstName`, `lastName`, `gender`, `pHIRegNo`, `pHIRange`, `addLine1`, `addLine2`, `province`, `district`, `contactNoOffice`, `contactNoMobile`) VALUES
(5, 'Jaffna Teaching Hospital', 'Udaya', 'Indrajith', 'Male', 'JPHI101', 'Nallur', '2 Udhaya Vasa', 'Browm Rd', 'Northern', 'Jaffna', '7868473645', '021 2227272');

CREATE TABLE `rDHSes` (
  `userId` int(10) UNSIGNED NOT NULL,
  `insName` varchar(35) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `gender` text NOT NULL,
  `rDHSDiv` varchar(8) NOT NULL,
  `addLine1` text NOT NULL,
  `addLine2` text,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `contactNoOffice` text NOT NULL,
  `contactNoMobile` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rDHSDiv`),
  CONSTRAINT rdhs_user_id FOREIGN KEY (userId) REFERENCES users(id) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rDHSes` (`userId`, `insName`, `firstName`, `lastName`, `gender`, `rDHSDiv`, `addLine1`, `addLine2`, `province`, `district`, `contactNoOffice`, `contactNoMobile`) VALUES
(8, 'Jaffna Teaching Hospital', 'Maran ', 'Naven', 'Male', 'JRDHS101', '34/2', 'Sivan Rd', 'Northern', 'Jaffna', '0753415267', '0212216356');

CREATE TABLE `patients` (
  `paId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) UNSIGNED NOT NULL,
  `insName` varchar(35) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `nickName` text,
  `gender` text NOT NULL,
  `birthDate` date DEFAULT NULL,
  `yearOfBirth` int(4) DEFAULT NULL,
  `age` int(3) NOT NULL,
  `nextOfKinFirstName` text,
  `nextOfKinLastName` text,
  `guardian` text,
  `guardianFirstName` text,
  `guardianLastName` text,
  `ethnicGroup` text,
  `resAddLine1` text NOT NULL,
  `resAddLine2` text,
  `resGsDivName` text,
  `resGsDiv` text,
  `resDsDiv` text,
  `resDistrict` text NOT NULL,
  `resProvince` text NOT NULL,  
  `resMohArea` text NOT NULL,
  `resPhiRange` text NOT NULL,
  `resLandmark` text NOT NULL,
  `curAddLine1` text NOT NULL,
  `curAddLine2` text,
  `curGsDivName` text,
  `curGsDiv` text,
  `curDsDiv` text,
  `curDistrict` text NOT NULL,
  `curProvince` text NOT NULL,  
  `curMohArea` text NOT NULL,
  `curPhiRange` text NOT NULL,
  `curLandmark` text NOT NULL,
  `contactNoMobile` text NOT NULL,
  `contactNoHome` text NOT NULL,
  `visitArea` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`paId`),
  CONSTRAINT pa_user_id FOREIGN KEY (userId) REFERENCES users(id) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `patients` (`paId`, `userId`, `insName`, `firstName`, `lastName`, `nickName`, `gender`, `birthDate`, `yearOfBirth`, `age`, `nextOfKinFirstName`, `nextOfKinLastName`, `guardian`, `guardianFirstName`, `guardianLastName`, `ethnicGroup`, `resAddLine1`, `resAddLine2`, `resGsDivName`, `resGsDiv`, `resDsDiv`, `resDistrict`, `resProvince`, `resMohArea`, `resPhiRange`, `resLandmark`, `curAddLine1`, `curAddLine2`, `curGsDivName`, `curGsDiv`, `curDsDiv`, `curDistrict`, `curProvince`, `curMohArea`, `curPhiRange`, `curLandmark`, `contactNoMobile`, `contactNoHome`, `visitArea`) VALUES
(1, 1, 'Nagaa Medical Centre', 'Singh', 'Mahi', '', 'Male', '0000-00-00', 0, 18, 'Priyanka', 'Dhoni', '', '', '', '', '23 Navalar Road', '-', '-', '-', 'Jaffna', 'Northern', '', '', '', 'Infront of Navalar Cultural Hall', '23 Navalar Road', '-', '-', '-', 'Jaffna', 'Northern', '', '', '', 'Infront of Navalar Cultural Hall', '', '0212219947',''),
(2, 1, 'Renny Dental and Optical Service', 'Dhoni', 'Rajendran', '', 'Male', '2014-01-16', 0, 3, 'Priyanka', 'Dhoni', '', '', '', '', '23 Navalar Road', '-', '-', '-', 'Jaffna', 'Northern', '', '', '', 'Infront of Navalar Cultural Hall', '23 Navalar Road', '-', '-', '-', 'Jaffna', 'Northern', '', '', '', 'Infront of Navalar Cultural Hall', '', '0212219947',''),
(3, 1, 'Nagaa Medical Centre', 'Shadshi', 'Sai', 'Shan', 'Female', '2015-01-06', 0, 2, '', '', 'Mother', 'Shan', 'Sri', '', '67, Palam Road', 'Kandarmadam', '-', '-', 'Jaffna', 'Northern', '', '', '', 'Infront of Navalar Cultural Hall', '67, Palam Road', 'Kandarmadam', '-', '-', 'Jaffna', 'Northern', '', '', '', 'Infront of Navalar Cultural Hall', '077 177 1134', '', '');

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(10) UNSIGNED NOT NULL,
  `insName` varchar(35) NOT NULL,
  `paId` int(11) NOT NULL,
  `diseaseGroup` text NOT NULL,
  `diseaseName` text NOT NULL,
  `onsetDate` date NOT NULL,
  `regDate` date NOT NULL,
  `regOrBHTNo` text,
  `ward` text NOT NULL,
  `ns1` text,
  `igm` text,
  `igg` text NOT NULL,
  `designation` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT noti_user_id FOREIGN KEY (userId) REFERENCES users(id) ON UPDATE CASCADE,
  CONSTRAINT noti_pa_id FOREIGN KEY (paId) REFERENCES patients(paId) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `notifications` (`id`, `userId`, `insName`, `paId`, `diseaseGroup`, `diseaseName`, `onsetDate`, `regDate`, `regOrBHTNo`, `ward`, `ns1`, `igm`, `igg`, `designation`) VALUES
(29, 1, 'Nagaa Medical Centre', 1, 'Group A', 'Plague', '2017-01-03', '2017-01-13', 'BHT23', '', 'yes', '', '', 'Option 1'),
(31, 1, 'Renny Dental and Optical Service', 2, 'Group B', 'Severe Acute Respiratory Syndrome (SARS)', '2017-01-02', '2017-01-12', 'JTH70084', '14', 'yes', 'yes', '', 'Option 1'),
(32, 1, 'Nagaa Medical Centre', 3, 'Group A', 'Plague', '2015-01-13', '2015-01-14', 'BHT10', '', 'yes', 'yes', '', 'Consultant Physician');

CREATE TABLE `h411as` (
  `notifyId` varchar(8) NOT NULL,
  `rdhsDiv` varchar(8) NOT NULL,
  `mohArea` text NOT NULL,
  `mohRegNo` varchar(8) NOT NULL,
  `birthDate` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` text NOT NULL,
  `occupation` text NOT NULL,
  `sourceOfNotify` text NOT NULL,
  `specify` text,
  `diseaseAsNotify` text NOT NULL,
  `notifyDate` date NOT NULL,
  `diseaseAsConf` text NOT NULL,
  `confDate` date NOT NULL,
  `confirmedBy` text NOT NULL,
  `natureOfConf` text NOT NULL,
  `officeNote` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notifyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `h399s` (
  `entryId` varchar(8) NOT NULL,
  `weekEndDate` date NOT NULL,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `rdhsDiv` varchar(8) NOT NULL,
  `mohArea` text NOT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `weeklySummarys` (
  `entryId` varchar(8) NOT NULL,
  `summary` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `chankanais` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `chavakachcheris` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `jaffnas` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `karaveddys` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `kaytses` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `kopays` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nallurs` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pointpedros` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sandilipays` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tellipalais` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `uduvils` (
  `entryId` varchar(8) NOT NULL,
  `phiArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `totals` (
  `entryId` varchar(8) NOT NULL,
  `mohArea` text NOT NULL,
  `cholera` int(5) DEFAULT NULL,
  `polio` int(5) DEFAULT NULL,
  `chickenPox` int(5) DEFAULT NULL,
  `dengue` int(5) DEFAULT NULL,
  `diphtheria` int(5) DEFAULT NULL,
  `dysentery` int(5) DEFAULT NULL,
  `encephalitis` int(5) DEFAULT NULL,
  `entericFever` int(5) DEFAULT NULL,
  `foodPoisoning` int(5) DEFAULT NULL,
  `humanRabies` int(5) DEFAULT NULL,
  `leptospirosis` int(5) DEFAULT NULL,
  `malaria` int(5) DEFAULT NULL,
  `neasles` int(5) DEFAULT NULL,
  `meningities` int(5) DEFAULT NULL,
  `mumps` int(5) DEFAULT NULL,
  `rubella` int(5) DEFAULT NULL,
  `congenitalRubella` int(5) DEFAULT NULL,
  `sampleConFever` int(5) DEFAULT NULL,
  `tetanus` int(5) DEFAULT NULL,
  `neonatal` int(5) DEFAULT NULL,
  `typhusFever` int(5) DEFAULT NULL,
  `viralHepatitis` int(5) DEFAULT NULL,
  `whoopingCough` int(5) DEFAULT NULL,
  `tuberculosis` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `h411s` (
  `notifyId` varchar(8) NOT NULL,
  `phiRegNo` varchar(8) NOT NULL,
  `phiRange` text NOT NULL,
  `mohNotifyNo` text NOT NULL,
  `mohArea` text NOT NULL,
  `mohRegNo` varchar(8) NOT NULL,
  `diseaseNotified` text NOT NULL,
  `notifyDate` date NOT NULL,
  `diseaseConf` text NOT NULL,
  `confDate` date NOT NULL,
  `patFname` text NOT NULL,
  `patLname` text NOT NULL,
  `addLine1` text NOT NULL,
  `addLine2` text,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `dsDiv` text NOT NULL,
  `gsDiv` text NOT NULL,
  `birthDate` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` text NOT NULL,
  `ethnicGroup` text,
  `onsetDate` date NOT NULL,
  `hospDate` date NOT NULL,
  `dischDate` date NOT NULL,
  `hospital` text NOT NULL,
  `outcome` text NOT NULL,
  `isolated` text NOT NULL,
  `patMovement` text NOT NULL,
  `labFinding` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notifyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `contactInvesticates` (
  `notifyId` varchar(8) NOT NULL,
  `contId` varchar(8) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `age` int(3) NOT NULL,
  `seenDate` date NOT NULL,
  `opsevation` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notifyId`,`contId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `patientEventHistorys` (
  `notifyId` varchar(8) NOT NULL,
  `symptomDevelop` text,
  `indigenous` text,
  `western` text,
  `bothTreatment` text,
  `noTreatment` text,
  `complication` text,
  `foreign` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notifyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
