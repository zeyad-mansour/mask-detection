import os
import sys
import subprocess
import io

#EXAMPLE CLI INPUT:
#python SDM.py input_data/file.jpg
#python SDM.py input_data/file.mp4
#python SDM.py 0 (webcam)
#python SDM.py rtsp://170.93.143.139/rtplive/470011e600ef003a004ee33696235daa
#python SDM.py http://wmccpinetop.axiscam.net/mjpg/video.mjpg

#clears the CLI

os.system('cls' if os.name == 'nt' else 'clear')
len_argv = len(sys.argv)

if len_argv in [1, 2]:
    if len_argv == 1:
        result = subprocess.run(["/home/zeyad/anaconda3/bin/python", "yolov5/detect.py", "--weights", "yolov5/weights/best.pt", "--source", "0", "--iou-thres", "0.3", "--conf-thres", "0.6"], capture_output=True)
        result = str(result.stdout)
        print(result[result.rindex(":") + 2:])
    else:
        result = subprocess.run(["/home/zeyad/anaconda3/bin/python", "yolov5/detect.py", "--weights", "yolov5/weights/best.pt", "--source", sys.argv[1], "--iou-thres", "0.3", "--conf-thres", "0.6"], capture_output=True)
        result = str(result.stdout)
        print(result[result.rindex(":") + 2: -3])
else:
    raise Exception("Invalid Arguments")
    sys.quit()
