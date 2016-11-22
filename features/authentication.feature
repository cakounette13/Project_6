 Feature: Authentication
  In order to gain access to the add bird area
  As an admin user
  I need to be able to login and logout

  Scenario: Login in
    Given I am on "/"
    When i follow "login"
    When I fill "username" with "moi"
    When I fill "password" with "moi"

  Scenario: Logout
    Given I am on "/"
    When i follow "logout"
    Then I should be on "/"