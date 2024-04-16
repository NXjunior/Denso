INSERT INTO "public"."slot" ("period_id", "name", "desp", "note", "extra", "slot_date", "time_start", "time_end", "quota", "creator", "created_at", "updater", "updated_at", "status") VALUES
(1, '2024-04-25', NULL, NULL, NULL, '2024-04-25', '08:00:00', '09:00:00', 20, 1, NOW(), NULL, NULL, 10),
(1, '2024-04-25', NULL, NULL, NULL, '2024-04-25', '09:00:00', '10:00:00', 10, 1, NOW(), NULL, NULL, 10),
(1, '2024-04-25', NULL, NULL, NULL, '2024-04-25', '10:00:00', '11:00:00', 0, 1, NOW(), NULL, NULL, 10),
(1, '2024-04-25', NULL, NULL, NULL, '2024-04-25', '11:00:00', '12:00:00', 10, 1, NOW(), NULL, NULL, 10),
(1, '2024-04-25', NULL, NULL, NULL, '2024-04-25', '12:00:00', '13:00:00', 10, 1, NOW(), NULL, NULL, 10),
(1, '2024-04-25', 'Break', NULL, NULL, '2024-04-25', '13:00:00', '14:00:00', 0, 1, NOW(), NULL, NULL, 10),
(1, '2024-04-25', NULL, NULL, NULL, '2024-04-25', '14:00:00', '15:00:00', 20, 1, NOW(), NULL, NULL, 10),
(1, '2024-04-25', NULL, NULL, NULL, '2024-04-25', '15:00:00', '16:00:00', 20, 1, NOW(), NULL, NULL, 10),
(1, '2024-04-25', NULL, NULL, NULL, '2024-04-25', '16:00:00', '17:00:00', 30, 1, NOW(), NULL, NULL, 10);




https://docs.google.com/spreadsheets/d/1RvSSh_wLjXa1Kl11FPa2A4Abu_VpV0DPfQqk6gTcjfc/edit?usp=sharing



SELECT setval('booking_id_seq', (SELECT MAX(id) FROM booking)+1);
SELECT setval('booking_meta_id_seq', (SELECT MAX(id) FROM booking_meta)+1);
SELECT setval('slot_id_seq', (SELECT MAX(id) FROM slot)+1);
SELECT setval('period_id_seq', (SELECT MAX(id) FROM period)+1);
SELECT setval('company_id_seq', (SELECT MAX(id) FROM company)+1);
SELECT setval('employee_id_seq', (SELECT MAX(id) FROM employee)+1);
SELECT setval('employee_meta_id_seq', (SELECT MAX(id) FROM employee_meta)+1);
SELECT setval('activity_id_seq', (SELECT MAX(id) FROM activity)+1);
SELECT setval('user_id_seq', (SELECT MAX(id) FROM "user")+1);

