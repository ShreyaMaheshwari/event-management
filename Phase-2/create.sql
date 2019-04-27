CREATE TABLE STUDENT(SName 	VARCHAR(40) 	NOT NULL,
					 SPhone 	CHAR(10)				,
					 SEmail 	VARCHAR (30)    NOT NULL,
					 SStream 	VARCHAR (20)			,
					 SId 		VARCHAR (10) 		PRIMARY KEY,
					 SPassword 	VARCHAR(10)		NOT NULL,
					 SCollege	 VARCHAR(30)		NOT NULL
					);
					 
CREATE TABLE HOBBY( ID 			VARCHAR(10) 				,
					Hobby 		VARCHAR(15) 	NOT NULL,
					FOREIGN KEY(ID) REFERENCES STUDENT(SId) ON DELETE CASCADE
				  );
						
						
CREATE TABLE ORGANISER( Oname   VARCHAR(40)		NOT NULL,
						OEmail  VARCHAR(20)		NOT NULL,
						Ophone  CHAR(10)     NOT NULL,
						OId     VARCHAR(10)        PRIMARY KEY, 
						OCollege VARCHAR(20) NOT NULL, 
						OPassword VARCHAR(20) NOT NULL
					  );
					   
CREATE TABLE EVENT( EName 		VARCHAR(40) 		NOT NULL,	
					EMaxPar     INT  			NOT NULL,
					EFee 		DECIMAL(9,2),
					ESize 		INT 			NOT NULL,
					EType		 VARCHAR(15)				,
					EVenue		 VARCHAR(20) 		NOT NULL,
					EId		 VARCHAR(10) 		PRIMARY KEY ,
					EFund	 	 DECIMAL(10,2),	
					ECollege		 VARCHAR(30)
				  );
				  
CREATE TABLE EVDATE(ID 		CHAR(10) 		,
					EDate	 VARCHAR(10) 		NOT NULL,
					FOREIGN KEY(ID) REFERENCES EVENT(EId) ON DELETE CASCADE
					);
					
CREATE TABLE REGISTRATION( RPrize 			VARCHAR(15) DEFAULT 'NONE'	,
						   RCertificate  	VARCHAR(10)		DEFAULT 'no' , 
						   REvId			 VARCHAR(10)					,
						   RId 			VARCHAR(10) 		PRIMARY KEY ,
						   FOREIGN KEY(REvId) REFERENCES EVENT(EId) ON DELETE CASCADE
						  );

CREATE TABLE TEAM_MEM(RId VARCHAR(10)	,
					  SId VARCHAR(10)	, 
					  FOREIGN KEY(RId) REFERENCES REGISTRATION(RId), 
					  FOREIGN KEY(SId) REFERENCES STUDENT(SId));
						  
						  
CREATE TABLE UPDATES (OId   		VARCHAR(10) , 
					  RId VARCHAR(10) ,
					  FOREIGN KEY(OId) REFERENCES ORGANISER(OId),
					  FOREIGN KEY(RId) REFERENCES REGISTRATION(RId)
					  );
					  
					  
						
CREATE TABLE CREATES(EId 	VARCHAR(10) ,
					 OId 		VARCHAR(10) , 
					 FOREIGN KEY(EId) REFERENCES EVENT(EId), 
					 FOREIGN KEY(OId) REFERENCES ORGANISER(OId)
					);

CREATE TABLE FUNDS(EId 		 VARCHAR(10) , 
		   FActivity 		VARCHAR(50)		NOT NULL, 
		   FAmount	  DECIMAL(9,2)			NOT NULL, 
			FOREIGN KEY(EId) REFERENCES EVENT(EId));
				
		