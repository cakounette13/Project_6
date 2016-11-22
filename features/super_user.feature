Feature: Super User
  In order to manage the last observations
  As a Super User
  I need to login as Super User
  then need to be able to validate or delete the last observations

  Scenario: Manage last observations
    Given I am on the homepage
    And I click on "#Connexion"
    And I fill in "_username" with "quentin2"
    And I fill in "_password" with "qwerty"
    And I press "Connexion"
    Then I should be on "/"
    Then I follow "Dernières observations"
    And I click on ""
