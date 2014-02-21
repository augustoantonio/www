SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `Noparadellover`.`projects` 
ADD INDEX `fk_projects_project_types_idx` (`project_types_idproject_type` ASC),
ADD INDEX `fk_projects_companies1_idx` (`companies_idcompany` ASC),
DROP INDEX `fk_projects_companies1_idx` ,
DROP INDEX `fk_projects_project_types_idx` ;

CREATE TABLE IF NOT EXISTS `Noparadellover`.`teams` (
  `projects_idproject` INT(11) NOT NULL,
  `users_iduser` INT(11) NOT NULL,
  `duties_idduty` INT(11) NOT NULL,
  PRIMARY KEY (`projects_idproject`, `users_iduser`, `duties_idduty`),
  INDEX `fk_projects_has_users_users1_idx` (`users_iduser` ASC),
  INDEX `fk_projects_has_users_projects1_idx` (`projects_idproject` ASC),
  INDEX `fk_teams_duties1_idx` (`duties_idduty` ASC),
  CONSTRAINT `fk_projects_has_users_projects1`
    FOREIGN KEY (`projects_idproject`)
    REFERENCES `Noparadellover`.`projects` (`idproject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_has_users_users1`
    FOREIGN KEY (`users_iduser`)
    REFERENCES `mydb`.`users` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_teams_duties1`
    FOREIGN KEY (`duties_idduty`)
    REFERENCES `Noparadellover`.`duties` (`idduty`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

DROP TABLE IF EXISTS `Noparadellover`.`teams` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
