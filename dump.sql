create table otzovik
(
    id     int auto_increment
        primary key,
    name   varchar(50)   not null,
    review varchar(1000) not null,
    date   datetime      null,
    rating int(1)        null
);

INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (75, 'Test', 'Test', '2020-07-23 16:24:00', 1);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (76, 'Test1', 'Test1', '2020-07-16 16:24:00', 2);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (77, 'Test2', 'Test2', '2020-07-25 16:25:00', 2);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (78, 'Test3', 'Test3', '2020-07-24 16:25:00', 4);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (79, 'Test4', 'Test4', '2020-07-14 16:25:00', 5);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (80, 'Test5', 'Test5', '2020-07-09 16:25:00', 4);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (81, 'Test6', 'Test6', '2020-07-24 16:25:00', 5);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (82, 'Test7', 'Test7', '2020-07-16 16:25:00', 1);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (83, 'Test8', 'Test8', '2020-07-23 16:25:48', 1);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (84, 'Test9', 'Test9', '2020-07-23 16:25:55', 1);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (85, 'Test0', 'Test0', '2020-07-04 16:25:00', 3);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (86, 'Дмитрий', 'Мой первый отзыв в интернете.', '2020-07-23 16:26:00', 5);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (87, 'gfdgf', 'dfgdfg', '2020-07-09 17:02:00', 2);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (88, 'gf', 'fg', '2020-07-17 17:06:00', 3);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (89, 'sdfsdf', 'sdffd', '2020-07-11 18:02:00', 2);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (90, 'asdf', 'sdf', '2020-07-09 18:03:00', 3);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (91, 'asdf', 'sdfa', '2020-07-10 18:05:00', 2);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (92, 'asdf', 'sdaf', '2020-07-15 18:06:00', 2);
INSERT INTO otzovik.otzovik (id, name, review, date, rating) VALUES (93, 'asf', 'sadf', '2020-07-16 18:06:00', 5);