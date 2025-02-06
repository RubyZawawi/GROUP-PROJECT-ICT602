package com.example.healthlocator;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;
import android.view.View;
import androidx.appcompat.app.AppCompatActivity;

public class HomeActivity extends AppCompatActivity {

    // Declare UI elements
    private TextView pageTitle;
    private TextView userInfo;
    private Button mapButton;
    private Button checkInButton;
    private Button aboutButton;
    private Button profileButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        // Initialize UI elements
        pageTitle = findViewById(R.id.page_title);
        userInfo = findViewById(R.id.user_info);
        mapButton = findViewById(R.id.map_button);
        checkInButton = findViewById(R.id.checkin_button);
        aboutButton = findViewById(R.id.about_button);
        profileButton = findViewById(R.id.profile_button);

        // Retrieve the logged-in username from SharedPreferences
        SharedPreferences sharedPreferences = getSharedPreferences("UserPrefs", MODE_PRIVATE);
        String loggedInUsername = sharedPreferences.getString("loggedInUsername", "Guest");

        // Set the username in the TextView
        userInfo.setText("Welcome, " + loggedInUsername);

        //location
        mapButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                openLocation();
            }
        });

        // Set up click listeners for each button
        checkInButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                userCheckIn();
            }
        });

        aboutButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openAbout();
            }
        });

        profileButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openProfile();
            }
        });
    }

    private void openLocation() {
        //location
        Intent intent = new Intent(HomeActivity.this, LocationActivity.class);
        startActivity(intent);
    }

    // Methods to handle button actions
    private void userCheckIn() {
        // Implement the logic to handle user check-in functionality
        Intent intent = new Intent(HomeActivity.this, CheckInActivity.class);
        startActivity(intent);
    }



    private void openAbout() {
        // Create an Intent to open AboutActivity
        Intent intent = new Intent(HomeActivity.this, AboutActivity.class);
        startActivity(intent);
    }

    private void openProfile() {
        // Create an Intent to open ProfileActivity
        Intent intent = new Intent(HomeActivity.this, UserDetailsActivity.class);
        startActivity(intent);
    }
}
