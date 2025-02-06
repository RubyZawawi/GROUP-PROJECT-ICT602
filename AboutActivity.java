package com.example.healthlocator;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import androidx.appcompat.app.AppCompatActivity;

public class AboutActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_about);

        // Initialize the GitHub button
        Button githubButton = findViewById(R.id.githubButton);

        // Set up a click listener for the GitHub button
        githubButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Open GitHub URL in a browser
                String githubUrl = "https://github.com/RubyZawawi/GROUP-PROJECT-ICT602";
                Intent browserIntent = new Intent(Intent.ACTION_VIEW, android.net.Uri.parse(githubUrl));
                startActivity(browserIntent);
            }
        });
    }
}
