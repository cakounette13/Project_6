Feature: Authentication
  In order to gain access to admin area
  As an admin
  I need to be able to login and logout

  Scenario: Logging in and logout
    Given I am on the homepage
    And I click on "#Connexion"
    And I fill in "_username" with "arthur"
    And I fill in "_password" with "qwerty"
    And I press "Connexion"
    Then I should be on "/"
    And I click on "#Deconnexion"