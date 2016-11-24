@fixtures
Feature: Super User
  In order to manage the last observations
  As a Super User
  I need to login as Super User
  then need to be able to validate or delete the last observations

  Background:
    Given I am on the homepage
    And I click on "#logoNavbar"
    And I fill in "_username" with "emoen"
    And I fill in "_password" with "qwerty"
    And I press "Connexion"
    Then I should be on "/"
    Then I follow "Observation"

  Scenario: Manage last observations
    Given there is an observation form "quentin"
    And I click on ""
