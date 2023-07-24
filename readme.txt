Треба створити таблицi:

1.classes.
поля:
-id(auto_increment,int(11),),
-class(int(1),),
-lit(varchar(1)),
-graduate(date,по умолчанию null).

2.library.
поля:
-id(auto_increment,int(11)),
-inv_number(int(11),
-iндекс унiкальностi),
-name_book(varchar(100)),
date_edition(int(11)),
-borrow_date(date,по умолчанию null),
-return_date(date,по умолчанию null),
-id_teachers(int(11)),
-id_schoolboys(int(11)).

3.register_bd.
поля:
-id(auto_increment,int(11)),
-login(varchar(100)),
-pass(varchar(255),по умолчанию null),
role(varchar(50),по умолчанию user),
-email(varchar(50)).Для адмiна та бiблiотекаря значення поля role треба ввести в базi замiсть 'по умолчанию user'.

4.schoolboys.
поля:
-id(auto_increment,int(11)),
-pip(varchar(50),по умолчанию null),
-dn(date,по умолчанию null),
-id_classes(int(11),по умолчанию null),
-graduate(date,по умолчанию null)

5.teachers.
поля:
-id(auto_increment,int(11)),
-pip(varchar(100)),
-class_id(int(11),iндекс унiкальностi).