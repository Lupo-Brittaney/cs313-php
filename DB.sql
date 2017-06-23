CREATE TABLE public.user(
    id SERIAL NOT NULL PRIMARY KEY,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    email varchar(40) NOT NULL UNIQUE

);
CREATE TABLE public.org
(
    id SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    fee INT NOT NULL
);
CREATE TABLE public.member
(
    id SERIAL NOT NULL PRIMARY KEY,
    person_id INT NOT NULL REFERENCES public.user(id),
    org_id INT NOT NULL REFERENCES public.org(id)
);

CREATE TABLE public.payment
(
    id SERIAL NOT NULL PRIMARY KEY,
    member_id INT NOT NULL REFERENCES public.member(id),
    payment INT NOT NULL,
    date date
);


-----------------------------------------------------
DROP table public.payment;
DROP table public.member;
DROP table public.user;

CREATE TABLE public.person(
    id SERIAL NOT NULL PRIMARY KEY,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    email varchar(40) NOT NULL UNIQUE

);
CREATE TABLE public.member
(
    id SERIAL NOT NULL PRIMARY KEY,
    person_id INT NOT NULL REFERENCES public.person(id),
    org_id INT NOT NULL REFERENCES public.org(id)
);

CREATE TABLE public.payment
(
    id SERIAL NOT NULL PRIMARY KEY,
    member_id INT NOT NULL REFERENCES public.member(id),
    payment INT NOT NULL,
    date date
);

INSERT INTO public.person (firstname, lastname, email)
VALUES ('Vince', 'Lupo', 'vl@mail.com');

INSERT INTO public.person (firstname, lastname, email)
VALUES ('Sam', 'Smith', 'ss@mail.com');

INSERT INTO public.org (name, fee)
VALUES ('Hard Chargers', '55');

INSERT INTO public.org (name, fee)
VALUES ('Sluggers', '50');

INSERT INTO public.member (person_id, org_id)
VALUES ('1', '1');

INSERT INTO public.member (person_id, org_id)
VALUES ('2', '1');

INSERT INTO public.member (person_id, org_id)
VALUES ('2', '2');

SELECT org.name, org.fee
FROM org
INNER JOIN member
ON org.id = member.org_id
WHERE member.person_id = '1';

SELECT * FROM person
WHERE email= 'ss@mail.com';

----------------------------------------------------
ALTER TABLE public.org
ADD ownerId INT;

ALTER TABLE public.org
ADD FOREIGN KEY (ownerId) REFERENCES person(id);

UPDATE public.org
SET ownerId ='1'
WHERE id=1;

UPDATE public.org
SET ownerId ='2'
WHERE id=2;


---------------------------------------------------
DROP table public.payment;
DROP table public.member;


CREATE TABLE public.member
(
    id SERIAL NOT NULL PRIMARY KEY,
    person_id INT NOT NULL REFERENCES public.person(id),
    org_id INT NOT NULL REFERENCES public.org(id),
    payAmount INT NOT NULL,
    payDate date,
    payType VARCHAR(40)
);
INSERT INTO public.member (person_id, org_id, payAmount, payDate, payType)
VALUES ('1', '2', '50', '05/30/2017', 'cash');

INSERT INTO public.member (person_id, org_id, payAmount, payDate, payType)
VALUES ('2', '1', '55', '05/30/2017', 'cash');

INSERT INTO public.person (firstname, lastname, email)
VALUES ('James', 'Jones', 'jj@mail.com');

INSERT INTO public.member (person_id, org_id, payAmount, payDate, payType)
VALUES ('3', '1', '55', '05/30/2017', 'check');

SELECT p.firstname, p.lastname, p.email, m.payAmount
FROM person p
INNER JOIN member m 
ON p.id = m.person_id
WHERE m.org_id = 1;

---------------------------------------
ALTER TABLE member
DROP COLUMN payDate;