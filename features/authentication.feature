 Feature: Authentication
  In order to gain access to the add bird area
  As an anonymous user
  I need to be able to register

   Scenario: Register
     Given I am on the homepage
     And I follow "Inscription"
     Then I should be on "/inscription/"
