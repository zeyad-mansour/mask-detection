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
#os.system('cls' if os.name == 'nt' else 'clear')

len_argv = len(sys.argv)

if platform.system() == "Linux":
    python_dir = str(subprocess.check_output("which python", shell=True))[2:-3]
else:
    python_dir = "python"

debug = True if "debug" in sys.argv else False
detect_args = [python_dir, "yolov5/detect.py", "--weights", "yolov5/weights/200thEpoch.pt", "--source", "0", "--iou-thres", "0.3", "--conf-thres", "0.6"]

if len_argv not in {1, 2, 3}: raise Exception("extraneous arguments")

if len_argv != 1 and not (len_argv == 2 and debug):
    detect_args[5] = sys.argv[1]

if debug:
    print("debugging...")
    subprocess.run(detect_args)
else:
    result = str(subprocess.run(detect_args, capture_output=True).stdout)
    print(result[result.rindex(":") + 2: -3])
