#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE TDL_USER(
        ID_USER    Int  Auto_increment  NOT NULL ,
        FIRST_NAME  Varchar (50) NOT NULL ,
        LAST_NAME Varchar (50) NOT NULL ,
        PASSWORD   Varchar (255) NOT NULL ,
        EMAIL      Varchar (50) NOT NULL
	,CONSTRAINT TDL_USER_AK UNIQUE (EMAIL)
	,CONSTRAINT TDL_USER_PK PRIMARY KEY (ID_USER)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: priority
#------------------------------------------------------------

CREATE TABLE TDL_PRIORITY(
        ID_PRIORITY Int  Auto_increment  NOT NULL ,
        NAME        Varchar (255) NOT NULL
	,CONSTRAINT TDL_PRIORITY_PK PRIMARY KEY (ID_PRIORITY)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: task
#------------------------------------------------------------

CREATE TABLE TDL_TASK(
        ID_TASK     Int  Auto_increment  NOT NULL ,
        TITLE       Varchar (50) NOT NULL ,
        DESCRIPTION Text NOT NULL ,
        DATE        Date NOT NULL ,
        ID_USER     Int NOT NULL ,
        ID_PRIORITY Int NOT NULL
	,CONSTRAINT TDL_TASK_PK PRIMARY KEY (ID_TASK)

	,CONSTRAINT TDL_TASK_TDL_USER_FK FOREIGN KEY (ID_USER) REFERENCES TDL_USER(ID_USER)
	,CONSTRAINT TDL_TASK_TDL_PRIORITY0_FK FOREIGN KEY (ID_PRIORITY) REFERENCES TDL_PRIORITY(ID_PRIORITY)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE TDL_CATEGORY(
        ID_CATEGORY Int  Auto_increment  NOT NULL ,
        NAME        Varchar (50) NOT NULL
	,CONSTRAINT TDL_CATEGORY_PK PRIMARY KEY (ID_CATEGORY)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Have
#------------------------------------------------------------

CREATE TABLE TDL_HAVE(
        ID_CATEGORY Int NOT NULL ,
        ID_TASK     Int NOT NULL
	,CONSTRAINT TDL_HAVE_PK PRIMARY KEY (ID_CATEGORY,ID_TASK)

	,CONSTRAINT TDL_HAVE_TDL_CATEGORY_FK FOREIGN KEY (ID_CATEGORY) REFERENCES TDL_CATEGORY(ID_CATEGORY)
	,CONSTRAINT TDL_HAVE_TDL_TASK0_FK FOREIGN KEY (ID_TASK) REFERENCES TDL_TASK(ID_TASK)
)ENGINE=InnoDB;

