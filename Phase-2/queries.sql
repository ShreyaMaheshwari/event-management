-- 1. Find all the events that a particular organiser is organising 

SELECT EName 
FROM EVENT, ORGANISER, CREATES
WHERE Oname = 'John Welch' AND CREATES.EId = EVENT.EId AND CREATES.OId = ORGANISER.OId;

-- 2. Find all the events that a particular student has registered for 

SELECT EName
FROM EVENT, STUDENT, REGISTRATION, TEAM_MEM
WHERE STUDENT.SId = TEAM_MEM.SId AND REGISTRATION.RId = TEAM_MEM.RId AND REGISTRATION.REvId = EVENT.EId AND STUDENT.SName = 'Tia Dixon';

-- 3. List of students who have registered for an event

SELECT STUDENT.SId, STUDENT.SName 
FROM STUDENT, EVENT, TEAM_MEM, REGISTRATION
WHERE STUDENT.SId = TEAM_MEM.SId AND REGISTRATION.RId = TEAM_MEM.RId AND EVENT.EId = REGISTRATION.REvId AND EVENT.EName = 'Debate';

-- 4. Recommend events to a student based on their hobbies 

SELECT EVENT.EName 
FROM STUDENT, HOBBY, EVENT 
WHERE STUDENT.SId = HOBBY.ID AND EVENT.EType = HOBBY.Hobby AND STUDENT.SName = 'Harley Castillo';

-- 5. Display the winners given an event 

SELECT STUDENT.SName, REGISTRATION.RPrize 
FROM STUDENT, REGISTRATION, TEAM_MEM, EVENT
WHERE TEAM_MEM.SId = STUDENT.SId AND REGISTRATION.RId = TEAM_MEM.RId AND REGISTRATION.REvId = EVENT.EId AND EVENT.EId = '7' AND REGISTRATION.RPrize != 'NONE' 
ORDER BY RPrize::int;

-- 6. Given a venue, display all the dates it is being used

SELECT EDate
FROM EVENT, EVDATE
WHERE EVENT.EId = EVDATE.ID AND EVenue = 'B303';

-- 7. Given an event, print details

SELECT EName, EFee, ESize, EType, EVenue, EDate
FROM EVENT, EVDATE
WHERE EVENT.EId = EVDATE.ID AND EVENT.EName = 'Debate';

-- 8. Find the total number of teams who have registered for a particular event presently 

SELECT COUNT(*)
FROM REGISTRATION, EVENT
WHERE REGISTRATION.REvId = EVENT.EId AND EId = '7';

-- 9. Find people with the same hobbies 

SELECT SName, SPhone, Hobby
FROM STUDENT, HOBBY
WHERE STUDENT.SId = HOBBY.ID AND HOBBY.Hobby IN (SELECT Hobby FROM STUDENT, HOBBY WHERE STUDENT.SId = HOBBY.ID AND STUDENT.SName = 'Harley Castillo') AND SName != 'Harley Castillo';

-- 10. Find out the total amount of money each organiser has made so far

SELECT OName, SUM(EVENT.EFee)
FROM ORGANISER, EVENT, REGISTRATION, CREATES
WHERE ORGANISER.OId = CREATES.OId AND EVENT.EId = CREATES.EId AND REGISTRATION.REvId = EVENT.EId
GROUP BY OName;
